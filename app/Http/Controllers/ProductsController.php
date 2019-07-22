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

    //Metodo para Search del Navbar
    public function searchByName(Request $request)
    {
        $item = $request->input('search');
        
        $request->validate([
            'search' => 'required'
        ],
        [
            'search.required' => 'Ingresa el producto que deseas encontrar'
        ]);

        $name = $request->search;

        $productsFound = Product::where('name', 'LIKE', "%$name%")->paginate(9);

        $countItem = count($productsFound);

        //dd($productFound);

        return view('front.Product.searchShow', compact('productsFound', 'item', 'countItem') );
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
			'image' => 'required | image'
		], [
            'name.required' => 'El nombre del producto es obligatorio',
            'name.max' => 'El máximo permitido es 10',
			'required' => 'El campo :attribute es obligatorio',
			'numeric' => 'El campo :attribute debe ser numérico',           
            'category_id.required' => 'Debes seleccionar una categoría',
            'brand_id.required' => 'Debes seleccionar una marca',
            'image.required' => 'Selecciona una imagen descriptiva del producto',
            'image.image' => 'Formato de imágen no válido',
            'price.required' => 'Ponele precio o nos fundimos'
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
        $productFound = Product::findOrFail($id);

        return view('front.Product.show', compact('productFound') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit = Product::findOrFail($id);
        $brands = \App\Brand::orderBy('name')->get();
        $categories = \App\Category::orderBy('name')->get();

        return view('front.Product.edit', compact('productEdit', 'brands', 'categories') );
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
        $productUpdate = Product::findOrFail($id);

        $request->validate([
			
			'name' => 'required | max:25',
			'price' => 'required | numeric',
			'description' => 'required',
			'category_id' => 'required',
			'brand_id' => 'required',
			'image' => 'image'
		], [
            'name.required' => 'El nombre del producto es obligatorio',
            'name.max' => 'El máximo permitido es 10',
			'required' => 'El campo :attribute es obligatorio',
			'numeric' => 'El campo :attribute debe ser numérico',           
            'category_id.required' => 'Debes seleccionar una categoría',
            'brand_id.required' => 'Debes seleccionar una marca',
            'image.image' => 'Formato de imágen no válido',
            'price.required' => 'Ponele precio o nos fundimos'
            ]);

        $productUpdate = new Product;

        $productUpdate->name = $request->input('name');
        $productUpdate->price = $request->input('price');
        $productUpdate->description = $request->input('description');
        $productUpdate->category_id = $request->input('category_id');
        $productUpdate->brand_id = $request->input('brand_id');

        $imagen = $request->file('image');

        if ($imagen) {
            $finalImage = uniqid("img_") . "." . $imagen->extension();
            $imagen->storePubliclyAs("public/products", $finalImage);
            $productUpdate->image = $finalImage;
        }


        $productUpdate->save();



        return redirect('/products/create'); //Esto hay que redireccionarlo a otro lado.

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDestroy = Product::findOrFail($id);

        $productDestroy->delete();

        return redirect('/products/create');
    }
}
