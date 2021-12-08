<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Redirect;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender'=> 'required',
            'password' => 'required|min:5'
        ]);
        // dd($request->all());
        if ($validated) {
            $data=User::create([

                'name' => $request->name,
                'email'=> $request->email,
                'gender' => $request->gender,
                'password' => Hash::make($request->password)  
            ]);
        }
        return Redirect::route('user_login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $token=Session::get('user_token');
        $validated = $request->validate([

            'email'    => 'required',
            'password' => 'required'

        ]);
        // dd($request->all());
        if(Auth::attempt([
            'email'    => request('email'), 
            'password' => request('password')
            ]))
        { 

            return redirect::route('board', compact('token'));

        } 
        else
        { 
            return redirect()->route('login');
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user_login');
    }
}
