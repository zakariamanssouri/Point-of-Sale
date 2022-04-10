<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["pizza", "coffe"];

        foreach ($categories as $category) {
            Category::create([
                'categoryname' => $category,
            ]);
        }

    }
}
