<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\Custom_Mail;
use App\Models\Comment;
use Illuminate\Support\Facades\{DB,Validator};
use App\Classes\ResponseMessage;

class ColumnController extends Controller
{
    
    public function creat(Request $request)
    {
        $response = getDefaultResponse();
        
        $rules = [
               'userId'  => 'required',
               'columnName' => 'required',
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
                $column=Custom_mail::create([

                    'user_id' => $request->userId,
                    'col_name'=> $request->columnName
                    ]);
                if($column) 
                {
                    DB::commit();
                    $response['data']['code']       = 200;
                    $response['data']['message']    = 'Column was created sucessfully.';
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

    public function update_colume(Request $request)
    {
        $response = getDefaultResponse();
        $rules = [
            'columnId'   => 'required',
            'columnName' => 'required',
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
                $data=Custom_Mail::where('id', $request->columnId)->update([

                    'col_name' => $request->columnName

                   ]);
                  
                if($data)
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'Column was updated sucessfully.';
                }
                else
                {
                    DB::rollBack();
                }   
            }
            catch (\Exception $e)
            {
                $response['data']['error'] = $e;
                DB::rollBack();
            }
            
        }
        
            return $response;
    }

    public function done_card(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'userId'    => 'required',
            'messageId' => 'required',
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
               $column=Custom_Mail::where('user_id', $request->userId)->where('col_name', 'Done')->first();
               $id=$column->id;
               if($column)
               {
                // return $column;
                $data=Mail::where('id', $request->messageId)->update([ 

                    "colume_id"=> $id
                ]);
                    if($data)
                    {
                        DB::commit();
                        $response['data']['code']    = 200;
                        $response['data']['message'] = 'Card move to done successfully';
                    }
                    else
                    {
                        DB::rollBack();
                    }
               }
               else
               {
                   DB::rollBack();
               }
            }
            catch (\Exception $e)
            {
                $response['data']['error'] = $e;
                DB::rollBack();
            }
        }
        
        return $response;
    }

    public function destroy(Request $request)
    {
        
    }
}
