<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mail;
use Carbon\Carbon;
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
        //
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender'=> 'required',
            'password' => 'required|min:5'
        ]);
        // return $request;
        if ($validated) {
            $data=User::create([

                'name' => $request->name,
                'email'=> $request->email,
                'gender' => $request->gender,
                'password' => Hash::make($request->password)  
            ]);
        }
        return response()->json(['data'=>$data], 200);
    }

    public function login(Request $request){

        if(auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        { 
            $token=auth()->user()->createToken('MyApp')-> accessToken; 
            return response()->json(['message'=>'user login successfully','data'=>auth()->user(),'token'=>$token], 200);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check()) {
            $data=Auth()->user();
        return response()->json(['data'=>$data], 200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
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

    public function logout(Request $request)
    {
        
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        
    }

    public function set_date(Request $request)
    {
        // return $request;
        $date=Carbon::now();
        if ($request->time == 'Today') {
            
            $dat=Carbon::now()->addHour(+1)->toTimeString();
            $data=Mail::where('id', $request->messageId)->update([

                'due_date' => $dat

               ]);
               return response()->json(['data'=>$dat], 200);
            
        }elseif ($request->time == 'Tomorrow') {

            $dat=Carbon::now()->addDay(+1)->toTimeString();
            $data=Mail::where('id', $request->messageId)->update([

                'due_date' => $dat

               ]);
               return response()->json(['data'=>$dat], 200);
            
        }elseif ($request->time == 'This Weekend') {

            $dat=Carbon::now()->addWeek(-4)->toDateString();
            $data=Mail::where('id', $request->messageId)->update([

                'due_date' => $dat

               ]);
               return response()->json(['data'=>$dat], 200);
            
        }elseif ($request->time == 'Next Week') {

            $dat=Carbon::now()->addWeek(+1)->toDateString();
            $data=Mail::where('id', $request->messageId)->update([

                'due_date' => $dat

               ]);
               return response()->json(['data'=>$dat], 200);
            
        }elseif ($request->time == 'Next Month') {

            $dat=Carbon::now()->addMonth(+1)->toTimeString();
            $data=Mail::where('id', $request->messageId)->update([

                'due_date' => $dat

               ]);
               return response()->json(['data'=>$dat], 200);
            
        }
    }
}
