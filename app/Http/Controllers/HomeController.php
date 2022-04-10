<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{


   /* public function __construct()
    {
        $this->middleware('auth');
    }*/


    public function index()
    {
        return view('home');
    }


    public function test()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('app.testss.index',compact('clients','products'));
    }


}
