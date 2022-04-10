<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:super_admin']);
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $roles = Role::where('name', 'LIKE', '%' . $request->search . "%")
                ->paginate(5);
            return view('app.users.roles.index', compact('roles'));
        }
        $roles = Role::where('id','!=','1')->orderBy("id")->paginate(5);
        return view('app.users.roles.index', compact('roles'));


    }



    public function create()
    {
        return view('app.users.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required', 'string','max:255', 'unique:roles'],
        ]);
        $request_role = $request->except('permissions');
        $role = Role::create($request_role);
        $role->syncPermissions($request->permissions);

        $title = 'Rôle ' .$request->name .' a été créé avec success';
        toast($title, 'success');
        return redirect(route('users.roles.index'));
    }

    public function show(Role $role)
    {
        //
    }


    public function edit(User $user,$id)
    {

        $role = Role::findOrFail($id);
        return view('app.users.roles.edit',compact('role','user'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',

        ]);
        $request_data = $request;
        $role = Role::findOrFail($request->id);
        $role->update($request->except('permissions'));
        $role->syncPermissions($request_data->permissions);

        $title = "Rôle " . $request_data['name'] . " a été modifié";
        toast($title, 'success');
        return redirect(route('users.roles.index'));

    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $title = "Rôle " . $role->name . " a été supprimé avec succès";
        toast($title, 'success');
        $role->delete();
        return redirect()->route('users.roles.index');

    }
}
