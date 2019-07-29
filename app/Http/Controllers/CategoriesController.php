<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = Category::all();

        return view('back.Category.index', compact('allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.Category.create');
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
            'name' => 'required',
            'icon' => 'required' 
        ], 
        [
            'icon.required' => 'Debes elegir un icono de Fontawsome'
        ]);

        Category::create([
            'name' => $request->input('name'),
            'icon' => $request->input('icon')
        ]);

        return redirect('/categorias');
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
        $categoryFound = Category::findOrFail($id);

        return view('back.Category.edit', compact('categoryFound'));
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
        $categoryFound = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'icon' => 'required' 
        ], 
        [
            'icon.required' => 'Debes elegir un icono de Fontawsome'
        ]);

        $categoryFound->name = $request->input('name');
        $categoryFound->icon = $request->input('icon');

        $categoryFound->save();
        
        return redirect('/categorias');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryFound = Category::findOrFail($id);

        $categoryFound->delete();

        return back(); 
    }
}
