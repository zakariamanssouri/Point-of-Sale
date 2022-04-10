<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        $products = ['pizza', 'coffe'];

        foreach ($products as $product) {
            Product::create([
                "product_name" => $product,
                "sale_price"=>19.2
            ]);
        }
        }

}
