<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{
    public function __construct()
    {
        //assuming the user is authenticated
        $this->middleware('auth');

        //middelwares for permissions
        $this->middleware(['permission:create_products'])->only('create');
        $this->middleware(['permission:read_products'])->only('read');
        $this->middleware(['permission:update_products'])->only('edit');
        $this->middleware(['permission:delete_products'])->only('delete');
    }

    public function index(Request $request)
    {

        if ($request->search) {
            //if user search for a product something then return the result
            $products = Product::where('product_name', 'LIKE', '%' . $request->search . "%")
                ->orWhere('reference', 'LIKE', '%' . $request->search . "%")
                ->paginate(5);
            return view('app.products.index', compact('products'));
        }
        $products = Product::paginate(5);
        return view('app.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('app.products.create', compact('categories'));

    }


    public function store(Request $request)
    {
        //validate the request
        $request->validate
        ([
            'product_name' => ['required', 'string', 'max:255', 'min:1'],
            'description' => 'max:255',
            'reference' => 'max:255', 'unique:products',
            'sale_price' => 'required',
            'category_id' => 'required',
            'image'=>'image'
        ]);
        $request_data = $request->except(['category_id', 'image']);


        if ($request->image) {
            Image::make($request->image)
                ->resize(300, 300)
                ->save(public_path('images/products_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }

        $product = Product::create($request_data);
        /*get the categories which the product belongs to */
        $request_data['category_id'] = $request->input('category_id');
        /*sync the categories for the product*/
        $product->category()->sync($request_data['category_id']);


        //notification  title that the product  is created
        $title = "le produit  " . $product->product_name . " a été créé avec succès ";

        //show the notification
        toast($title, 'success');
        return redirect()->route('products.index');

    }




    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('app.products.edit',compact('product','categories'));
    }


    public function update(Request $request)
    {
        //find the product wich we want to update
        $product = Product::findOrFail($request->id);


        //validate the request data
        $request->validate
        ([
            'product_name' => ['required', 'string', 'max:255', 'min:1'],
            'description' => 'max:255',
            'reference' => 'max:255', 'unique:products',
            'sale_price' => 'required',
            'category_id' => 'required',
            'image'=>'image'
        ]);

        $request_data = $request->except(['category_id', 'image']);


        //update image
        if($request->image){

            //delete old image

            if ($product->image!='default.jpg') {
                Storage::disk('public_images')->delete('/products_images/'.$product->image);
            }

            //make and resize the image
            Image::make($request->image)->resize(300, 300
            )->save(public_path('images/products_images/' .$request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
        }
        /*update the user*/
        $product->update($request_data);

        /*get the categories which the product belongs to */
        $request_data['category_id'] = $request->input('category_id');

        /*sync the categories for the product*/
        $product->category()->sync($request_data['category_id']);

        //notify that the user is created successfully
        $title = "le produit " . $request_data['product_name'] . " a été modifié";
        toast($title, 'success');

        return redirect(route('products.index'));
        /*end*/
    }


    public function destroy($id)
    {
        /*find the product*/
        $product = Product::findOrFail($id);


        //delete the user image
        if ($product->image!='default.jpg') {
            Storage::disk('public_images')->delete('/products_images/'.$product->image);
        }

        $title = "le produit " . $product->product_name . " a été supprimer avec succès";
        toast($title, 'success');
        $product->delete();
        return redirect()->route('products.index');
    }

    public function searchproducts()
    {
        $search_content = $_GET['search_content'];
        $products = Product::where('product_name', 'LIKE', '%' . $search_content . "%")->get();

        $output = '';
        foreach ($products as $product) {
            $output .= '<div class="col s4 m3 l3">
                        <div class="card animate fadeLeft product-card">
                            <div class="">
                                <div>
                                    <img src="'.$product->image_path.'" class="responsive-img rounded-circle" alt="">
                                </div>
                                <div class="display-flex justify-content-center product-title">
                                    '.$product->product_name.'
                                </div>
                                <div class="display-flex flex-wrap justify-content-center">
                                    <h5 class="mt-3">'.$product->sale_price.'$</h5>
                                </div>
                                <div class="display-flex justify-content-center">
                                    <a
                                            id="product-'.$product->id.'"
                                            data-name="'.$product->product_name.'"
                                            data-id="'.$product->id.'"
                                            data-price="'.$product->sale_price.'"
                                            data-image=" '.$product->image_path.' "
                                            class="btn-floating waves-effect waves-light cyan  add-product-btn mb-2"
                                    >
                                        <i class="material-icons">add</i>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $data =array(
            'row_result' => $output,

        );

    }


}
