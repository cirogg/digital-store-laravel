<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(App\User::class)->times(10)->create();
      $products = factory(App\Product::class)->times(10)->create();
      $brands = factory(App\Brand::class)->times(10)->create();
      $categories = factory(App\Category::class)->times(10)->create();
    }
}
