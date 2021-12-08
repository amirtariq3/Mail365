<?php
namespace App\Http\Controllers;

use App\TokenStore\TokenCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ReplyEmailRequest;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Mai;
use Redirect;
use Arr;
use Session;
use Carbon\Carbon;
use ConvertId;
use App\Models\Mail;
use App\Models\Mails_ali;
use App\Models\Mails_archive;
use App\Models\Mails_conversation_history;
use App\Models\Mails_deleted_items;
use App\Models\Mails_demo;
use App\Models\Mails_drafts;
use App\Models\Mails_faran;
use App\Models\Mails_farann;
use App\Models\Mails_inbox;
use App\Models\Mails_junk_email;
use App\Models\Mails_send_item;
use App\Models\Custom_Mail;

class BoardController extends Controller
{
    

    public function ali($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAKaujrAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_ali::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_ali::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_ali::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_ali',compact('arr2','token','arr1','colume'));
    }
    public function Archive($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEpAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);
        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_archive::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_archive::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_archive::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_archive',compact('arr2','token','arr1','colume'));
    }
    public function Conversation_History($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAE6AAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_conversation_history::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=MailsMails_conversation_history_ali::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_conversation_history::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_conversation_history',compact('arr2','token','arr1','colume'));
    }
    public function Deleted_Items($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEKAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_deleted_items::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_deleted_items::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_deleted_items::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_deleted_items',compact('arr2','token','arr1','colume'));
    }
    public function Demo($token, $parentFolderId)
    {
        $id=Session::get('user_id');
        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAMHuPGAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_demo::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_demo::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_demo::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_demo',compact('arr2','token','arr1','colume'));
    }
    public function Drafts($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEPAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_drafts::where('message_id', $value1->id)->first();
                      
                      if ($mail) {
                        
                        $count++;

                      }else
                      {
                        
                        $data=Mails_drafts::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>"faran@nexconcept007.onmicrosoft.com",
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>(isset($value1->toRecipients[0]->emailAddress->name)?($value1->toRecipients[0]->emailAddress->name):"null"),
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_drafts::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_drafts',compact('arr2','token','arr1','colume'));
    }
    public function faran($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAMHuO6AAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_faran::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_faran::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen($value1->body->content)>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_faran::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_faran',compact('arr2','token','arr1','colume'));
    }
    public function farann($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAZx-4qAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_farann::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_farann::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_farann::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_farann',compact('arr2','token','arr1','colume'));
    }
    public function Inbox($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages?top=100")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_inbox::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_inbox::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_inbox::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_inbox',compact('arr2','token','arr1','colume'));
    }
    public function Junk_Email($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAETAAA=/messages?top=100")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_junk_email::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_junk_email::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_junk_email::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_junk_email',compact('arr2','token','arr1','colume'));
    }
    public function Send_Item($token, $parentFolderId)
    {
        $id=Session::get('user_id');

        $date =Carbon::now();
      $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEJAAA=/messages?top=100")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);

        

          $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $val=json_encode($valll[$count], true);
                    $value1=json_decode($val);

                   
                      $mail=Mails_send_item::where('message_id', $value1->id)->first();
                      
                      if ($mail) {

                        $count++;

                      }else
                      {
                        
                        $data=Mails_send_item::create([

                            
                          'message_id' => $value1->id,
                          'user_id'=>$id,
                          'subject' =>$value1->subject,
                          'sender_name'=>$value1->sender->emailAddress->name,
                          'sender_email'=>$value1->sender->emailAddress->address,
                          'receiver_name'=>$value1->toRecipients[0]->emailAddress->name,
                        //   'category'=>cat??null,
                          'date'=>$value1->createdDateTime,
                          'description'=>strlen(($value1->body->content))>255?substr(($value1->body->content),0,251)."...":($value1->body->content),
                          'colume_id'=>1
    
                        ]);
                      }
                
            }


            // $id=Session::get('user_id');
        $arr1=Mails_send_item::where('user_id', $id)->get();
        // dd($arr1);
        $colume=Custom_Mail::all();

        $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   return view('mail.board.task_board_send_item',compact('arr2','token','arr1','colume'));
    }

    public function status_ali($id, $col)
    {
        //  dd($id);
        $data=Mails_ali::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_archive($id, $col)
    {
        //  dd($id);
        $data=Mails_archive::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_conversation_history($id, $col)
    {
        //  dd($id);
        $data=Mails_conversation_history::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_deleted_items($id, $col)
    {
        //  dd($id);
        $data=Mails_deleted_items::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_demo($id, $col)
    {
        //  dd($id);
        $data=Mails_demo::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_drafts($id, $col)
    {
        //  dd($id);
        $data=Mails_drafts::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_faran($id, $col)
    {
        //  dd($id);
        $data=Mails_faran::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_farann($id, $col)
    {
        //  dd($id);
        $data=Mails_farann::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_inbox($id, $col)
    {
        //  dd($id);
        $data=Mails_inbox::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_junk_email($id, $col)
    {
        //  dd($id);
        $data=Mails_junk_email::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    public function status_send_item($id, $col)
    {
        //  dd($id);
        $data=Mails_send_item::where('id', $id)->update([ 

            "colume_id"=> $col,
        ]);
        
    }
    
}
?>