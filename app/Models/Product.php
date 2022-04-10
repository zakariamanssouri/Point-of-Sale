<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'reference',
        'description',
        'image',
        'purchase_price',
        'sale_price',
        'stock',
        'category_id',
    ];

    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsToMany(Category::class,'category_product');
    }


    public function getImagePathAttribute()
    {
        if ($this->image) {
            return asset('images/products_images/'.$this->image);
        }
        else {
            return asset('images/products_images/default.jpg');
        }
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_order');
    }
}
