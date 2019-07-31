<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'icon'];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id','id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
