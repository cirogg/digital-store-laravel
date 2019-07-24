<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = User::paginate(20);

        $countUsers = count(User::all());

        return view('back.User.index', compact('allUsers', 'countUsers'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userFound = User::findOrFail($id);

        return view('front.User.show', compact($userFound));
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


    public function searchByEmail(Request $request)
    {
        $item = $request->input('search');

        $request->validate([
            'search' => 'required'
        ],
        [
            'search.required' => 'Ingresa el mail que deseas encontrar'
        ]);

        $email = $request->search;

        $usersFound = User::where('email', 'LIKE', "%$email%")->paginate(3);

        $countItem = count($usersFound);

        //dd($productFound);

        return view('back.user.index', compact('usersFound', 'item', 'countItem') );
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
