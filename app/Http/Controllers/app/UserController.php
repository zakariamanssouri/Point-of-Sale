<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function __construct()
    {
        //assuming the user is authenticated
        $this->middleware('auth');

        //middelwares for permissions
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:read_users'])->only('read');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('delete');
    }

    public function index(Request $request)
    {
        //this is used for search
        //we can search by : first_name , last_name , and email:
        if ($request->search) {
            //if the search for something then return the result
            $users = User::where('first_name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('last_name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('email', 'LIKE', '%' . $request->search . "%")
                ->paginate(5);
            return view('app.users.index', compact('users'));
        }

        //normal case , return all users except the super_admin who has id=1
        //but we can show the admins by searching ...
        $users = User::where('id', '!=', '1')->paginate(5);

        //end
        return view('app.users.index', compact('users'));

    }

    public function create()
    {
        if (auth()->user()->hasRole('super_admin')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('name', '!=', 'super_admin')->get();
        }
        return view('app.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        //this methode used for create new users (  employees in our case)


        //validate the request
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:3'],
            'last_name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'role' => ['required', 'min:1'],
            'image'=>'image',
        ]);
        //get the request data
        $request_data = $request->except(['password', 'password_confirmation', 'role','image']);
        $request_data['password'] = bcrypt($request->password);

        //make and resize the image uploaded if exists.
        if($request->image){
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                })
                ->save(public_path('images/users_images/' .$request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

        }



        //create the user
        $user = User::create($request_data);
        //get the role
        $roles = $request->get('role');

        //attach the role
        $user->syncRoles($roles);

        //notification  title that the user  is created
        $title = "l'employé(e) " . $request_data['first_name'] . " a été créé avec succès ";

        //show the notification
        toast($title, 'success');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        // prevent normal users from editing admins account
        if ($user->hasRole('super_admin')) {
            if (auth()->user()->hasRole('super_admin')) {
                $roles = Role::all();
            } else {
                $title = "vous ne pouvez pas modifier le compte admin";
                toast($title, 'error');
                return redirect()->route('users.index');
            }
        }
        else {
            //show all roles for users who has super_admin role
            if (auth()->user()->hasRole('super_admin')) {
                $roles = Role::all();
            }
            //show all roles except super_admin for normal users
            else {
                $roles = Role::where('name','!=','super_admin')->get();
            }
        }
        //end
        return view('app.users.edit', compact('user', 'roles'));
    }



    public function update(Request $request)
    {

        //find the user wich we want to update
        $user = User::findOrFail($request->id);



        //validate the request data
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($user->id),],
            'role' => 'required',
            'image'=>'image',
        ]);


        $request_data = $request->except('password','password_confirmation','image');

        //get the new password
        $newPassword = $request->get('password');


        //update image
        if($request->image){

            //delete old image

            if ($user->image!='default.jpg') {
                Storage::disk('public_images')->delete('/users_images/'.$user->image);
            }

            //make and resize the image
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/users_images/' .$request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }



        //check if the password is existed in the request or not
        if ($newPassword==null) {

            //update the user without the password
            $user->update($request_data);
        } else {
            //update the user with the password
            $request_data['password'] = bcrypt($request->password);
            $user->update($request_data);
        }

        //sync roles for the user
        $user->syncRoles($request->get('role'));

        //notify that the user is updated successfully
        $title = "l'employé " . $request_data['first_name'] . " a été modifié";
        toast($title, 'success');

        //end
        return redirect(route('users.index'));
    }




    public function destroy($id)
    {

        /*find the user*/
        $user = User::findOrFail($id);

        if ($id == 1) {
            $title = "vous ne pouvez pas supprimer le compte admin";
            toast($title, 'error');
            return redirect()->route('users.index');
        }

        if ($user->id == auth()->user()->id) {
            $title = "vous ne pouvez pas supprimer votre compte";
            toast($title, 'error');
            return redirect()->route('users.index');
        }

        //delete the user image
        if ($user->image!='default.jpg') {
            Storage::disk('public_images')->delete('/users_images/'.$user->image);
        }


        if ($user->hasRole('super_admin')) {
            if (auth()->user()->hasRole('super_admin')) {

                //notify the user is deleted successfully
                $title = "l'employé " . $user->first_name . " a été supprimé avec succès";
                toast($title, 'success');

                //delete the user
                $user->delete();

                //end
                return redirect()->route('users.index');

            } else {
                //if the the authenticated user dosen't have super_admin role then it will be redirected to 403 page
                return view('errors.403');
            }


        } else {
            $title = "l'employé " . $user->first_name . " a été supprimer avec succès";
            toast($title, 'success');
            $user->delete();
            return redirect()->route('users.index');

        }

    }

}
