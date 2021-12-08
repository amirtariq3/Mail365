<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Todo;
use App\Models\User;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\Models\Mail;
use Carbon\Carbon;
use App\Models\Custom_Mail;
use App\Models\Notify;
use Redirect;
use Session;
use Auth;
use Str;
use App\Notifications\MailNotification;
use App\Notifications\TodoNotification;
use Illuminate\Support\Facades\Notification;


class CommentsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data=Notify::all();
        return view('mail.notification.notification', compact('data'));
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
    public function store(Request $request, $id)
    {
        // dd($id);
       
        $u = Comment::create([
            'message_id'     => $id,
            'comment'        => $request->comment
        ]);
        // Notification::send($data, new MailNotification($request->comment, $id));
        $user = Auth::user();
        if ($u) {
            $u = Notify::create([
                'user_id'    => $user->id,
                'message_id' => $id,
                'action'     => $user->name.' added comment '. $request->comment,
                'date'       => Carbon::now()
            ]);
            return Redirect::back()->with(['success' => 'your comment add successfully']);
        }else{
            return "some error";
        }
    }

    public function todo(Request $request, $id)
    {
        // dd($request->all());
        
        $u = Todo::create([
            'message_id'     => $id,
            'todo'           => $request->todo
        ]);
        $user = Auth::user();
        // Notification::send($data, new TodoNotification($request->todo));
        if ($u) {
            $u = Notify::create([
                'user_id'    => $user->id,
                'message_id' => $id,
                'action'     => $user->name.' added todo '. $request->todo,
                'date'       => Carbon::now()
            ]);
            return Redirect::back()->with(['success' => 'your Task add successfully']);
        }else{

            return "some error";
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete_todo($id)
    {
        // dd($id);
        $data=Todo::find($id);
        if ($data->delete()) {
            $user = Auth::user();
             $u = Notify::create([
            'user_id'    => $user->id,
            'message_id' => null,
            'action'     => $user->name.' delete todo '. $data->todo,
            'date'       => Carbon::now()
        ]);
        }
        
        return Redirect::back()->with(['success' => 'your Task Deleted successfully']);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function set_date(Request $request)
    {
        // dd($request->all());
        $date=Carbon::now();
        if ($request->time == 'Today') {
            
            $dat=Carbon::now()->addHour(+1)->toTimeString();
            $data=Mail::where('id', $request->set_date)->update([

                'due_date' => $dat

               ]);
               return Redirect::back()->with(['success' => 'your due_date added successfully']);
            
        }elseif ($request->time == 'Tomorrow') {

            $dat=Carbon::now()->addDay(+1)->toTimeString();
            $data=Mail::where('id', $request->set_date)->update([

                'due_date' => 'Tomorrow '.$dat

               ]);
               return Redirect::back()->with(['success' => 'your due_date added successfully']);
            
        }elseif ($request->time == 'This Weekend') {

            $dat=Carbon::now()->addWeek(-4)->toDateString();
            $data=Mail::where('id', $request->set_date)->update([

                'due_date' => $dat

               ]);
               return Redirect::back()->with(['success' => 'your due_date added successfully']);
            
        }elseif ($request->time == 'Next Week') {

            $dat=Carbon::now()->addWeek(+1)->toDateString();
            $data=Mail::where('id', $request->set_date)->update([

                'due_date' => $dat

               ]);
               return Redirect::back()->with(['success' => 'your due_date added successfully']);
            
        }elseif ($request->time == 'Next Month') {

            $dat=Carbon::now()->addMonth(+1)->toTimeString();
            $data=Mail::where('id', $request->set_date)->update([

                'due_date' => $dat

               ]);
               return Redirect::back()->with(['success' => 'your due_date added successfully']);
            
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function delete_set_date(Request $request, $id)
    {
        // dd($id);
        $data=Mail::where('id', $id)->update([

            'due_date' => null

           ]);
        return Redirect::back()->with(['success' => 'your due_date Deleted successfully']);

    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function header($token){

        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
        ->setReturnType(Model\MailFolder::class)
        ->execute();
    
         $arr=json_encode($ptr);
         $arr2=json_decode($arr);
         //dd($arr2);
        return view('mail.header', compact('arr2', 'token'));
      }

    public function allread()
    {
        $token=Session::get('user_token');
        $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            $arr=json_encode($ptr);
            $arr2=json_decode($arr);
            // dd($arr2[0]->id);

            $arr1=[];
            $count=0;
            foreach ($arr2 as $value) {
                    $value->id;  
                    $arr1[$count]=$value->id;
                    $count++;

                    $name=array(
                        "IsRead"=> true
                      );
                      $token=Session::get('user_token');
                      $graph = new Graph();
                      $graph->setAccessToken($token);
                      $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$value->id")
                      //->AddHeaders("Content-Type" => "application/json")
                      ->setReturnType(Model\Message::class)
                      ->attachBody($name)
                      ->execute();
                
                
            }
            return Redirect::back()->with(['success' => 'Your Message Mark-as-read Successfully']);
    }
    
    public function favorite(Request $request, $id)
    {
        // dd($id);
        $token=Session::get('user_token');
        //dd($token);
        $name=
        [
            "isFavorite"=> true
        ];
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("PATCH","https://graph.microsoft.com/v1.0/me/mailFolders")
        //  ->attachBody($name)
        //->setReturnType(Model\CategoryColor::class)
        ->setReturnType(Model\MailFolder::class)
        ->execute();
        dd($ptr);
        return Redirect::back()->with(['success' => 'Your Folder Move Successfully']);
    }
    
    public function filter(Request $request)
    {
        $token=Session::get('user_token');
        
        if ($request->filter == 'Unread') {
            
            $arr2=$this->header($token);
            // $arr2=$data->arr2;
        // dd($arr2);
            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            $arr=json_encode($ptr);
            $arr2=json_decode($arr);
            
            $valll =[];
            $count=0;
            foreach ($arr2 as $value) {
                if ($value->isRead == false) {
                    $valll [$count]=$value;
                    $count++;
                }
                
            }
            //  dd($valll );
            return view('mail.search_category', compact('valll','token','arr2'));
            
        } elseif($request->filter == 'Flagged') {

            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            $arr=json_encode($ptr);
            $arr2=json_decode($arr);
            // dd($arr2[5]->flag->flagStatus);
            $valll=[];
            $count=0;
            foreach ($arr2 as $value) {
                if ($value->flag->flagStatus == 'flagged') {
                    $valll[$count]=$value;
                    $count++;
                }
            }
            // dd($valll);
            return view('mail.search_category', compact('valll','token','arr2'));

                
        }elseif($request->filter == 'Attachment'){
            
            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            $arr=json_encode($ptr);
            $arr2=json_decode($arr);
            // dd($arr2[9]->hasAttachments);
            $valll=[];
            $count=0;
            foreach ($arr2 as $value) {
                if ($value->hasAttachments == true) {
                    $valll[$count]=$value;
                    $count++;
                }
            }
            // dd($valll);
            return view('mail.search_category', compact('valll','token','arr2'));
        }elseif($request->filter == 'Mentions'){
            
            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            $arr=json_encode($ptr);
            $arr2=json_decode($arr);
            // dd($arr2[0]->sender->emailAddress->address);
            $valll=[];
            $count=0;
            foreach ($arr2 as $value) {
                if ($value->sender->emailAddress->address == "faran@nexconcept007.onmicrosoft.com") {
                    $valll[$count]=$value;
                    $count++;
                }
            }
            // dd($valll);
            return view('mail.search_category', compact('valll','token','arr2'));
        }else{
            
            return "enter correct value";
        }
        
        
    }

    public function pin($id)
    {
        $token=Session::get('user_token');
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages")
        ->setReturnType(Model\Message::class)
        ->execute();
        $arr=json_encode($ptr, true);
        $arr1=json_decode($arr);
        //  dd($arr1[0]->id);
        $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
                    $valll[$count]=$value;
                    $count++;
                
            }
            dd($valll);
    }

    public function board($token)
    {
        // dd($token);
        $id=Session::get('user_id');
        // dd($id);
        $arr1=Mail::where('user_id', $id)->get();
        $comment=Comment::all();
        $colume=Custom_Mail::all();
        // $token=Session::get('user_token');
        // dd($token);
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
        ->setReturnType(Model\MailFolder::class)
        ->execute();

        $arr=json_encode($ptr);
        $arr2=json_decode($arr);

        return view('mail.board.task_board', compact('arr2','arr1', 'colume','token', 'comment'));
    }

    public function status($id, $col)
    {
        //  dd($id);
        $data=Mail::where('id', $id)->update([ 

            "colume_id"      => $col,
        ]);
        $user = Auth::user();
        // Notification::send($data, new TodoNotification($request->todo));
        $col_name=Custom_Mail::find($col);
        if ($data) {
            $u = Notify::create([
                'user_id'    => $user->id,
                'message_id' => $id,
                'action'     => $user->name.' Move Card to '. $col_name->col_name,
                'date'       => Carbon::now()
            ]);
        }
    }
    
}
