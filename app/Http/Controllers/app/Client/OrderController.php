<?php

namespace App\Http\Controllers\app\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        //assuming the user is authenticated
        $this->middleware('auth');

        //middelwares for permissions
        $this->middleware(['permission:create_orders'])->only('create');
        $this->middleware(['permission:read_orders'])->only('read');
        $this->middleware(['permission:update_orders'])->only('edit');
        $this->middleware(['permission:delete_orders'])->only('delete');
    }
    public function index()
    {
        $orders = Order::paginate(5);
        return view('app.orders.index',compact('orders'));
    }
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('app.clients.orders.create',compact('clients','products'));
    }
    public function show($id)
    {
        $order = Order::with(['products'])->findOrFail($id);
        return view('app.orders.show',compact('order'));

    }
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'client'=>'required',
            'products'=>'required',
            'quantities'=>'required',
        ]);
        //get the client;
        $client = Client::FindOrFail($request['client']);

        $this->attachorder($request, $client);

        $title = "la commande a été créé avec succès";
        toast($title, 'success');

        return redirect(route('clients.orders.index'));


    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients =Client::all();
        $products = Product::all();
        return view('app.clients.orders.edit',compact('order','clients','products'));
    }



    public function update(Request $request,$id)
    {
        //validate the request
        $request->validate([
            'client'=>'required',
            'products'=>'required',
            'quantities'=>'required',
        ]);
        $order = Order::FindOrFail($id);
        $client = Client::FindOrFail($request['client']);

        $this->dettachorder($order);
        $this->attachorder($request, $client);

        $title = "la commande a été modifié avec succès";
        toast($title, 'success');
        return redirect(route('clients.orders.index'));
    }




    public function destroy($id)
    {
        //find the order
        $order = Order::FindOrFail($id);

        //update the stock if exists
        foreach ($order->products as $product) {
            if ($product->stock) {
                $product->update([
                    'stock'=>$product->stock + $product->pivot->quantity,
                ]);
            }
        }

        //delete the order
        $order->delete();

        //show notification for the user
        $title = "la commande a été supprimé avec succès";
        toast($title, 'success');

        //redirect to orders index page
        return redirect(route('clients.orders.index'));

    }
    private function attachorder($request,$client)
    {
        //create order
        $order = $client->orders()->create([]);

        $total_price = 0;
        //calculate total price
        foreach ($request->products as $index => $product_id) {
            $product = Product::FindOrFail($product_id);
            $total_price += $product->sale_price*$request->quantities[$index];
            $order->products()->attach($product_id, ['quantity' => $request->quantities[$index]]);
        }

        //update the total price in the order
        $order->update([
            'total_price' => $total_price,
        ]);

        //update the stock if exists
        if ($product->stock!=0) {
            $product->update([
                'stock' => $product->stock - $request->quantities[$index],
            ]);
        }
    }
    private function dettachorder($order)
    {
        //update the stock if exists
        foreach ($order->products as $product) {
            if ($product->stock) {
                $product->update([
                    'stock'=>$product->stock + $product->pivot->quantity,
                ]);
            }
        }

        //delete the order
        $order->delete();
    }
}
