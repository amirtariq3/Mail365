<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Mail;
use App\Models\Custom_Mail;
use App\Models\Comment;
use Session;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function done_filter(Request $request)
    {
        
        $colume=Custom_Mail::all();
        $comment=Comment::all();
        $token=Session::get('user_token');
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
        ->setReturnType(Model\MailFolder::class)
        ->execute();

        $arr=json_encode($ptr);
        $arr2=json_decode($arr);

        $date=Carbon::now();
        if ($request->filter == 'one week') {
            
            $dat=Carbon::now()->addWeek(-1);
            
        }elseif ($request->filter == 'two weeks') {

            $dat=Carbon::now()->addWeek(-2);
            
        }elseif ($request->filter == 'one months') {

            $dat=Carbon::now()->addWeek(-4);
            
        }elseif ($request->filter == 'six weeks') {

            $dat=Carbon::now()->addWeek(-6);
            
        }elseif ($request->filter == 'two months') {

            $dat=Carbon::now()->addWeek(-9);
            
        }elseif ($request->filter == 'six months') {

            $dat=Carbon::now()->addWeek(-26);
            
        }
        
        $mail=Mail::all();
        $arr1=[];
        $count=0;
        foreach ($mail as $key => $value) {
            // dd($value);
            $yr=$value['date'][0].$value['date'][1].$value['date'][2].$value['date'][3];
            $mon=$value['date'][5].$value['date'][6];
            $day=$value['date'][8].$value['date'][9];
            // dd($day);
            $dt=Carbon::create($yr, $mon, $day);
            if($dt>$dat){

                $arr1[$count]=$value;
                $count++;
            }
        }
        // dd($arr1);
        // return response()->json(['data'=>$arr1]); 
        return view('mail.board.filter', compact('arr1', 'arr2', 'colume', 'token', 'comment'));

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
