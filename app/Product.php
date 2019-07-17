<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];



  public function brand()
{
  return $this->belongsTo(Brand::class);
}
public function user()
{
  return $this->belongsTo(User::class);
}
}
