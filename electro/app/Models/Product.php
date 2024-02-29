<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Avi;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'product_name',
        'product_price',
        'product_promo',
        'product_reduction',
        'product_brand',
        'product_description',
        'product_category',
        'category_id',
        'cover',
    ];

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function categories(){
        return $this->BelongsTo(Category::class);
    }
    public function avis(){
        return $this->hasMany(Avi::class)->where('status',1);
    }
}