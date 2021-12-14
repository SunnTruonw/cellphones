<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function storeDetails()
    {
        return $this->hasMany(StoreDetail::class , 'store_id' , 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'product_id' , 'id');
    }
}
