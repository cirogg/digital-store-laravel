<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','product_id','is_paid'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
