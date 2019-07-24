<?php

use Illuminate\Database\Seeder;

use App\Brand;
use App\User;
use App\Category;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(User::class)->times(30)->create();
      $products = factory(Product::class)->times(40)->create();
      $brands = factory(Brand::class)->times(10)->create();
      $categories = factory(Category::class)->times(10)->create();

      foreach ($products as  $product) {
        $product->category()->associate($categories->random(1)->first()->id);
        $product->brand()->associate($brands->random(1)->first()->id);
        $product->save();
      }  
    }
}
