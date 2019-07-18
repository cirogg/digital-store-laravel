<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = \App\Brand::orderBy('name')->get();
        $categories = \App\Category::orderBy('name')->get();


        return view('front.Product.create', compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
			
			'name' => 'required | max:25',
			'price' => 'required | numeric',
			'description' => 'required',
			'category_id' => 'required',
			'brand_id' => 'required',
			'image' => 'required'
		], [
            'name.required' => 'El nombre del producto es obligatorio',
            'name.max' => 'El máximo permitido es 10',
			'required' => 'El campo :attribute es obligatorio',
			'numeric' => 'El campo :attribute debe ser numérico',           
            
            ]);

        $product = new Product;

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');

        $imagen = $request->file('image');

        if ($imagen) {
            $finalImage = uniqid("img_") . "." . $imagen->extension();
            $imagen->storePubliclyAs("public/products", $finalImage);
            $product->image = $finalImage;
        }

        //dd($imagen);

        $product->save();



        return redirect('/products/create'); //Esto hay que redireccionarlo a otro lado.

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
