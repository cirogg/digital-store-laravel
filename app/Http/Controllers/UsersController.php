<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()){


            if ($id == Auth::user()->id or Auth::user()->admin == 1) {
                $userFound = User::findOrFail($id);
                return view('front.User.show', compact('userFound'));
            }else {
                $userFound = Auth::user();
                return redirect("/users/" . "$userFound->id");
            }
        }else{
            return redirect("/login");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userFound = User::findOrFail($id);

        if ($id == Auth::user()->id or Auth::user()->admin == 1) {
            return view('front.User.edit', compact('userFound'));
        }else {
            return redirect('/');
        }

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

        $request->validate([

          'name' => ['required', 'string', 'max:255'],
          'surname' => ['required', 'string', 'max:255'],
          'country' => ['required', 'string', 'max:255'],
          'city' => ['string', 'max:255'],
          'nickname' => ['required', 'string', 'max:255'],
        //   'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/DH/'],
          // 'avatar' => ['required', 'image']
      ]);

      $user = Auth::user();

            if ($user->email != $request->input('email')){
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            }

            if ($user->nickname != $request->input('nickname')){
            $request->validate([
                'nickname' => ['required', 'string', 'max:255', 'unique:users'],
            ]);
            }

            // if ($user->avatar = $request->input('avatar')){
            // $request->validate([
            //     'avatar' => ['required', 'image'],
            // ]);
            // }


      $user->nickname = $request->input('nickname');
      $user->email = $request->input('email');
      $user->surname = $request->input('surname');
      $user->country = $request->input('country');
      $user->name = $request->input('name');
      $user->city = $request->input('city');

      $imagen = $request->file('avatar');

      if ($imagen) {
        $finalImage = uniqid("img_") . "." . $imagen->extension();
        $imagen->storePubliclyAs("public/avatars", $finalImage);
        $user->avatar = $finalImage;
      }

      if ( ! $request->input('password') == '')
      {
        $user->password = bcrypt($request->input('password'));
      }

      $user->save();


      // $userUpdate = new User();

        // $userUpdate->name = $request->input('name');
        // $userUpdate->surname = $request->input('surname');
        // $userUpdate->nickname = $request->input('nickname');
        // $userUpdate->email = $request->input('email');
        // $userUpdate->country = $request->input('country');
        // $userUpdate->password = $request->input('password');
        //$userUpdate->country = $request->input('country');
        //$userUpdate->avatar = $request->input('avatar');


        //
        //
        // $userUpdate->save();



        return redirect("/users/$id");
    }


    public function searchByEmail(Request $request)
    {
        $item = $request->input('search-email');

        $request->validate([
            'search-email' => 'required'
        ],
        [
            'search-email.required' => 'Ingresa el mail que deseas encontrar'
        ]);

        //$email = $request;

        $userFound = User::where('email', 'LIKE', $item)->get();

        return view('back.User.profile', compact('userFound', 'item') );
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
