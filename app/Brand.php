<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id','id');
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class);
    }
}
