<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB,Validator};
use App\Classes\ResponseMessage;


class FilterController extends Controller
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
    public function search(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'keyword' => 'required',
            'userId'  => 'required'
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $name= $request->keyword;
                $mail=Mail::where('user_id', $request->userId)
                            ->where('subject', 'LIKE', '%'.$name.'%')
                            ->orWhere('sender_email', 'LIKE', '%' . $name . '%')
                            ->get();

                if($mail)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = $mail;
                }
                else
                {
                    DB::rollBack();
                }
            }
            catch (\Exception $e)
            {
                $response['data']['error'] = $e;
                // logError(__METHOD__, __LINE__ , $e);
                DB::rollBack();
            }

        }
    return $response;
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

    public function date_wise(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'fromDate' => 'required',
            'toDate'  => 'required'
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            try
            {
                $start_date = Carbon::parse(request()->fromDate)->toDateTimeString();
                $end_date = Carbon::parse(request()->toDate)->toDateTimeString();
                $data = Mail::whereBetween('created_at',[$start_date,$end_date])->get();

                if($data)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = $data;
                }
                else
                {
                    DB::rollBack();
                }
            }
            catch (\Exception $e)
            {
                $response['data']['error'] = $e;
                // logError(__METHOD__, __LINE__ , $e);
                DB::rollBack();
            }

        }
    return $response;
    }

    public function filter(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'filter' => 'required'
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            $date=Carbon::now();
            if ($request->filter == 'one week') 
            {    
                $dat=Carbon::now()->addWeek(-1);   
            }
            elseif ($request->filter == 'two weeks') 
            {
                $dat=Carbon::now()->addWeek(-2);   
            }
            elseif ($request->filter == 'one months') 
            {
                $dat=Carbon::now()->addWeek(-4);            
            }
            elseif ($request->filter == 'six weeks')
            {
                $dat=Carbon::now()->addWeek(-6);    
            }
            elseif ($request->filter == 'two months') 
            {
                $dat=Carbon::now()->addWeek(-9);    
            }
            elseif ($request->filter == 'six months') 
            {
                $dat=Carbon::now()->addWeek(-26);   
            }
            DB::beginTransaction();
            try
            {
                $mail=Mail::all();
                $arr1=[];
                $count=0;
                foreach ($mail as $key => $value) 
                {
                    $yr=$value['date'][0].$value['date'][1].$value['date'][2].$value['date'][3];
                    $mon=$value['date'][5].$value['date'][6];
                    $day=$value['date'][8].$value['date'][9];
                    $dt=Carbon::create($yr, $mon, $day);
                    if($dt>$dat)
                    {
                        $arr1[$count]=$value;
                        $count++;
                    }
                }

                if($mail)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = $mail;
                }
                else
                {
                    DB::rollBack();
                }
            }
            catch (\Exception $e)
            {
                $response['data']['error'] = $e;
                // logError(__METHOD__, __LINE__ , $e);
                DB::rollBack();
            }

        }
    return $response;
    }

}
