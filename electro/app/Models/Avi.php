<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Avi extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='avis';
    protected $fillable=[
        'product_id',
       'productName',
        'nameAvis',
        'emailAvis',
        'avis',
        'rating',
    ];

    public function products(){
        return $this->BelongsTo(Product::class);
    }

}
