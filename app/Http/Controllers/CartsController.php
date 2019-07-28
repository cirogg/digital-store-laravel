<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $productId = $request->input('product_id');

        $productCart = Cart::create([
            'user_id' => $userId,
            'product_id' => $productId
        ]);

        //return redirect("/cart/$userId");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::select('product_id')->where('user_id', $id)->get();

        $array_products_id = [];
        foreach ($cart as $oneCart) {
           $test = $oneCart->product_id;
           $array_products_id[] = $test;

        }

        //dd($array_products_id)

        $array_products_found = [];
        //$totalprice = 0;

        foreach ($array_products_id as $oneProduct_id) {
            $array_products_found[] = Product::find($oneProduct_id);
        }

        //dd($array_products_found);
        $totalPrice = 0;
        foreach ($array_products_found as $product_f) {
            $totalPrice = $totalPrice + $product_f->price;
        }
        //dd($totalPrice);

        //$totalPrice = Product::find($productsId)->where('is_paid', 0)->sum('price');
        //$totalPrice = 100;

        //dd($productsFound);

        return view('front.Cart.show', compact('array_products_found', 'totalPrice'));
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
    public function destroy($id, $productId)
    {
        $productFromCart = Cart::where([ ['user_id', $id], ['product_id', $productId] ])->first()->delete();
        //dd($productFromCart);

        return redirect('/cart/'. $id);
    }
}
