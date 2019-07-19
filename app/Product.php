<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Brand;
use App\User;
use App\Category;

class Product extends Model
{

    protected $fillable = [
        'name', 'price', 'description', 'image', 'category_id', 'brand_id', 'times_sold'
    ];



  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
