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

        return redirect("/cart/$userId");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productsId = Cart::select('product_id')->where('user_id', $id)->get();

        $productsFound = Product::find($productsId);

        $totalPrice = Product::find($productsId)->where('is_paid', 0)->sum('price');

        //dd($productsFound);

        return view('front.Cart.show', compact('productsFound', 'totalPrice'));
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
        $productFromCart = Cart::where([ ['user_id', $id], ['product_id', $productId] ])->delete();
        //dd($productFromCart);
        
        return redirect('/cart/'. $id);
    }
}
