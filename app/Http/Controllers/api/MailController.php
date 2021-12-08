<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ReplyEmailRequest;
use Session;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Redirect;
use App\Models\Mail;
use App\Models\Custom_Mail;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB,Validator};
use App\Classes\ResponseMessage;

class MailController extends Controller
{
    
  public function allmail(Request $request)
  {
    $data=$request->mails; 
    $id=$request->userId;
    $fol_id=$request->folderId;

    // $token=$request->token;
    // $graph = new Graph();
    //       $graph->setAccessToken($token);
    //       $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages?count=true")
    //                 // ->setReturnType(Model\Message::class)
    //                 // ->setReturnType(Model\Arr::class)
    //                 ->execute();
    //   $c=(array)$ptr;
          
    //   $count=$c["\x00Microsoft\Graph\Http\GraphResponse\x00_decodedBody"]["@odata.count"];
    // $graph = new Graph();
    // $graph->setAccessToken($token);
    // $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/messages?top=$count")
    //           ->setReturnType(Model\Message::class)
    //           ->execute();
              
            $colume=Custom_Mail::where('user_id', $id)->first();
            
            if (!isset($colume)) {
            $col_name=['All Mail', 'To do', 'In progress', 'Done'];
            $index=0;
            foreach ($col_name as $c_name) {
              $col_name[$index]=$c_name;
              $column=Custom_Mail::create([

                'user_id'=>$id,
                'col_name'=>$col_name[$index]
                ]);
                $index++;
            }
            
            }
            else{

                $col_id= $colume->id;
                $all_mail=Custom_Mail::where('id', $id)->get();

            }
$col_id=Custom_Mail::where('user_id', $id)->first();

            $valll=[];
            $count=0;
            foreach ($data as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count]=$value, true);
                    $value1=json_decode($val);
                    

                      $mail=Mail::where('message_id', $value1->id)->first();
                      // dd($mail);
                      if ($mail) {

                        $count++;
                        
                      }else
                      {
                        // dd($value1->sender->emailAddress->address);
                        $data=new Mail;
                        $data->message_id = $value1->id;
                        $data->user_id=$id;
                        $data->folder_id=$fol_id;
                        $data->subject =$value1->subject;
                        $data->sender_name=$value1->sender->emailAddress->name??null;
                        $data->sender_email=$value1->sender->emailAddress->address??null;
                        $data->receiver_name=$value1->toRecipients[0]->emailAddress->name??null;
                          // 'category'=>cat??null,
                        //   $graph = new Graph();
                        //   $graph->setAccessToken($token);
                        //   $ptr = $graph->createCollectionRequest("GET", "/me/messages/$value1->id/attachments/")
                        //   ->setReturnType(Model\Message::class)
                        //   ->execute();
                        //   $arr=json_encode($ptr);
                        //   $arr1=json_decode($arr);
                        //   $ind=0;
                        // foreach ($arr1 as $val) {
                          
                        //   $data->attachment=$arr1->contentBytes??null;
                        //   $ind++;
                        // }
                        $data->date=$value1->createdDateTime;
                        $data->discription=$value1->body->content;
                        $data->colume_id= $col_id->id;
                        $data->save();

                      }
            }
            
            // $mails=Custom_Mail::where('user_id', $id)->with('ColumnMail')->get();
                      

            $mails=Custom_Mail::where('user_id', $id)->get();
        //   return $mails;
            foreach ($mails as $m) {
           
              
              $all_mail=Mail::where('colume_id',$m->id)
              ->where('folder_id',$fol_id)
              ->with('Comment')
              ->with('Todo')
              ->get();
              $m->setAttribute('mails', $all_mail);

            }
            
            
        return response()->json(['data'=>$mails], 200);
  }

  public function allfolder(Request $request){

        $token=$request->token;
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
        ->setReturnType(Model\MailFolder::class)
        ->execute();

        $arr=json_encode($ptr);
        $arr2=json_decode($arr);
        return $arr2;
  }

  public function update(Request $request)
  {
    $response = getDefaultResponse();

        $rules = [
            'messageId'      => 'required',
            'columnId' => 'required'
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

                $data=Mail::where('id', $request->messageId)->update([ 

                  "colume_id"=> $request->columnId
                ]);
                if($data)
                {
                    DB::commit();
                    $response['data']['code'] = 200;
                    $response['data']['message'] = 'Mail Column Updated successfully.';
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

  public function send_mail (EmailRequest $request){
      // dd($request->all());
      $token=$request->token;
          $file=$request->attachment;
          // $content=base64_encode(file_get_contents($file));
          $folder_id=
          [
            "message"=> [
              "subject"=> $request->subject,
              "body"=> [
                "contentType"=> "Text",
                "content"=> $request->body
              ],
              "toRecipients"=> [
                [
                  "emailAddress"=> [
                    "address"=> $request->email
                ]
                ]
                  ],
              "ccRecipients"=> [
                [
                  "emailAddress"=> [
                    "address"=> "amirtariq3@gmail.com"
                  ]
                ],
                [
                  "emailAddress"=> [
                    "address"=> "hktmobileaccessories@gmail.com"
                  ]
                ]
              ]
              // "attachments"=> [
              //   [
              //     "@odata.type"=> "#microsoft.graph.fileAttachment",
              //     "name"=> $file->getClientOriginalName(),
              //     "contentType"=> $file->getClientOriginalExtension(),
              //     "contentBytes"=> $content
              //   ]
              // ]
            ]
                ];
          $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/sendMail")
                 ->attachBody($folder_id)
                 ->execute();
                 return response()->json(['message'=>'Mail Send Successfulyy'], 200);

      
  }

  public function reply_mail(Request $request){
    // dd($request->all());
    $id=$request->message_id;
    // dd($id);
    $token=$request->token;
    $folder_id=
    [
      "message"=>[
        "toRecipients"=>[
          [
            "emailAddress"=> [
              "address"=>$request->email,
            ]
            ],
          [
            "emailAddress"=>[
              "address"=>$request->email,
            ]
          ]
            ],
            "ccRecipients"=> [
              [
                "emailAddress"=> [
                  "address"=> "amirtariq3@gmail.com"
                ]
              ],
              [
                "emailAddress"=> [
                  "address"=> "hktmobileaccessories@gmail.com"
                ]
              ]
            ]

            ],
      "comment"=> $request->body
    ];
    $graph = new Graph();
    $graph->setAccessToken($token);
    $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/messages/$id/reply")
           ->attachBody($folder_id)
           //->setReturnType(Model\MailFolder::class)
           ->execute();
           return response()->json(['message'=>'Successfully replied your mail'], 200);
  }

  public function forward_mail(Request $request){
    //  dd($request->all());
    $mail=Mail::where('message_id',$request->message_id )->first();
    $forward_msg= strip_tags($mail->discription);
    $forward_subject=$mail->subject;

    $details= [
      'title'=> $forward_subject,
      'body' =>$forward_msg,
    ];
    \Mail::to($request->email)
    ->cc(['amirtariq3@gmai.com', 'hktmobileaccessories@gmail.com'])
    ->send(new \App\Mail\Mail($details));

    return response()->json(['message'=>'your mail forward successfully'], 200);
  }

  public function mail_detail($id)
  {      

    $data=Mail::where('id', $id)->get();
    return response()->json(['data' => $data], 200);

  }

  public function list_mail(Request $request)
  {
    $response = getDefaultResponse();

        $rules = [
            'userId'     => 'required',
            'folderId'   => 'required'
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
              $mails=Custom_Mail::where('user_id', $request->userId)->get();
              foreach ($mails as $m) 
              {
                $all_mail=Mail::where('colume_id',$m->id)
                ->where('folder_id',$request->folderId)
                ->with('Comment')
                ->with('Todo')
                ->get();
                $m->setAttribute('mails', $all_mail);
              }

                if($mails)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = $mails;
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

  public function destroy(Request $request)
  {
    $response = getDefaultResponse();

        $rules = [
            'messageId' => 'required'
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
                $data=Mail::where('id', $request->messageId)->update([ 

                        "is_deleted"=> 1,
                      ]);
                if($data)
                {
                    DB::commit();
                    $response['data']['code']    = 200;
                    $response['data']['message'] = 'Mail Column Updated sucessfully.';
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
