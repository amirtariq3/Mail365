<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Mail;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.signature');
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
        // $logo=$request->logo;
        // $imageName = time().'.'.$request->logo->getClientOriginalExtension();  
        // dd($imageName);
        // $request->image->move(public_path('images'), $imageName);

        // $imageName = time().'.'.$request->image->getClientOriginalExtension();  
        // $request->image->move(public_path('images'), $imageName);

        // $imageName = time().'.'.$request->image->getClientOriginalExtension();  
        // $request->image->move(public_path('images'), $imageName);
        $user = Auth::user();
        // dd($user->id);
        $data=Signature::create([

            "user_id"        => $user->id,
            "name"           => $request->name,
            "designation"    => $request->designation,
            "email"          => $request->email,
            "phone"          => $request->phone,
            "phone1"         => $request->phone1??null,
            "company_url"    => $request->company_url,
            "facebook_url"   => $request->facebook_url??null,
            "twitter_url"    => $request->twitter_url??null,
            "linkedin_url"   => $request->linkedin_url??null,
            "contact_url"    => $request->contact_url,
            "company_logo"   =>($request->logo)? $this->upload($request->logo): null,
            "contact_image"  =>($request->contact_image)? $this->upload1($request->contact_image): null,
            // "facebook_image"  =>($request->contact_image)? $this->upload($request->contact_image): null,
            "discription"    => $request->contact_url??null
          
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
        if (Auth::check()) {
            
            $data=Signature::where('user_id', Auth::user()->id)->get();
            return view('user.list', compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function datepicker(Signature $signature)
    {
        return view('user.date');
    }

    public function datestore(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $start_date = Carbon::parse(request()->fromDate)->toDateTimeString();
        $end_date = Carbon::parse(request()->toDate)->toDateTimeString();
        $data = Mail::whereBetween('created_at',[$start_date,$end_date])->get();
        return response()->json(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signature $signature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
        //
    }

    public function upload($image, $path="public/images")
    {
        if($image){
            $file = $image;
            $name =  uniqid().".".$file->getClientOriginalExtension();
            $file->move($path, $name);
            return $name;
        }else{
            return null;
        }
    }

    public function upload1($image, $path="public/images")
    {
        // dd($image);
        if($image){
            $file = $image;
            $name =  uniqid().".".$file->getClientOriginalExtension();
            $file->move($path, $name);
            return $name;
        }else{
            return null;
        }
    }
}
