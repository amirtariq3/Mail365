<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\Custom_mail;
use App\Models\Comment;
use App\Models\Todo;
use Illuminate\Support\Facades\{DB,Validator};
use App\Classes\ResponseMessage;

class CommentController extends Controller
{

    public function store_todo(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'messageId' => 'required',
            'todo'      => 'required'
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
                $u = Todo::create([
                    'message_id' => $request->messageId,
                    'todo' => $request->todo
                ]);

                if($u)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = 'Todo was created sucessfully.';
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
    
    public function delete_todo(Request $request)
    {
        

        $response = getDefaultResponse();

        $rules = [
            'Id' => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            // return $request;
            try
            {
                $data=Todo::where('id', $request->Id)->first();
                if($data->delete())
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'todo deleted successfully.';
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

    public function update_todo(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'todoId' => 'required',
            'check'  => 'required'
         ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            // return $request;
            try
            {
                // return $request;
                $data=Todo::where('id', $request->todoId)->update([

                    'checked' => $request->check
                ]);
                if($data)
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'todo updated successfully.';
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
    
    public function comment(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'messageId' => 'required',
            'comment'   => 'required'
         ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            // return $request;
            try
            {
                // return $request;
                $u = Comment::create([
                    'message_id' => $request->messageId,
                    'comment' => $request->comment
                ]);
                if($u)
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'Comment Added successfully.';
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
    
    public function delete_comment(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'Id' => 'required'
         ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails())
        {
            $response['data']['error'] = $validate->messages();
        }
        else
        {
            DB::beginTransaction();
            // return $request;
            try
            {
                // return $request;
                $data=Comment::find($request->Id);
                if($data->delete())
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'Comment Deleted successfully.';
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

    public function update_comment(Request $request)
    {
        $response = getDefaultResponse();

        $rules = [
            'Id'      => 'required',
            'comment' => 'required'
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

                $data=Comment::where('id', $request->Id)->update([

                    'comment'=> $request->comment
                ]);
                if($data)
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'Comment Updated successfully.';
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
