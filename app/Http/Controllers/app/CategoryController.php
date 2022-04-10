<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:read_categories'])->only('read');
        $this->middleware(['permission:update_categories'])->only('edit');
        $this->middleware(['permission:delete_categories'])->only('delete');
    }
    public function index(Request $request)
    {
        if ($request->search) {
            //if the search for something then return the result
            $categories = Category::where('categoryname', 'LIKE', '%' . $request->search . "%")
                ->paginate(5);
            return view('app.categories.index', compact('categories'));
        }
        $categories = Category::paginate(5);
        return view('app.categories.index',compact('categories'));

    }//end of index

    public function create()
    {
        return view('app.categories.create');
    }


    public function store(Request $request)
    {
        //request validation
        $request->validate([
            'categoryname' => ['required','unique:categories', 'string', 'max:255'],
        ]);

        $categorie = Category::create($request->all());
        $title = "la catégorie " . $categorie->categoryname . " a été créé avec succès ";

        //show the notification
        toast($title, 'success');
        return redirect()->route('categories.index');
    }




    public function edit(Category $category)
    {
        return view('app.categories.edit', compact('category'));
    }


    public function update(Request $request)
    {

        $category = Category::findOrFail($request->id);

        $request->validate([
            'categoryname' => ['required',Rule::unique('categories')->ignore($category->id),]
        ]);

        $category->update($request->all());
        $title = "la catégorie " . $request['categoryname'] . " a été modifié";
        toast($title, 'success');

        return redirect(route('categories.index'));

    }



    public function destroy($id)
    {

        /*find the category*/
        $category = Category::findOrFail($id);

        /*delete the category*/
        $category->delete();

//        notify the user
        $title = "la catégorie " . $category->categoryname . " a été supprimé";
        toast($title, 'success');
        return redirect(route('categories.index'));
    }
}
