<?php

namespace App\Http\Controllers;
use App\TokenStore\TokenCache;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ReplyEmailRequest;
use Session;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Mai;
use Auth;
use Redirect;
use App\Models\Mail;
use DB;
use Carbon\Carbon;


class AuthController extends Controller
{

    public $arr2;

  public function signin()
  {
    // Initialize the OAuth client
    $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
      'clientId'                => config('azure.appId'),
      'clientSecret'            => config('azure.appSecret'),
      'redirectUri'             => config('azure.redirectUri'),
      'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
      'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
      'urlResourceOwnerDetails' => '',
      'scopes'                  => config('azure.scopes')
    ]);

    $authUrl = $oauthClient->getAuthorizationUrl();

    // Save client state so we can validate in callback
    session(['oauthState' => $oauthClient->getState()]);

    // Redirect to AAD signin page
    return redirect()->away($authUrl);
  }

  // public function callback(Request $request)
  // {

  //   // Validate state
  //   $expectedState = session('oauthState');
  //   $request->session()->forget('oauthState');
  //   $providedState = $request->query('state');

  //   if (!isset($expectedState)) {
  //     // If there is no expected state in the session,
  //     // do nothing and redirect to the home page.
  //     return redirect('/');
  //   }

  //   if (!isset($providedState) || $expectedState != $providedState) {
  //     return redirect('/')
  //       ->with('error', 'Invalid auth state')
  //       ->with('errorDetail', 'The provided auth state did not match the expected value');
  //   }

  //   // Authorization code should be in the "code" query param
  //   $authCode = $request->query('code');
  //   if (isset($authCode)) {
  //     // Initialize the OAuth client
  //     $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
  //       'clientId'                => config('azure.appId'),
  //       'clientSecret'            => config('azure.appSecret'),
  //       'redirectUri'             => config('azure.redirectUri'),
  //       'urlAuthorize'            => config('azure.authority').config('azure.authorizeEndpoint'),
  //       'urlAccessToken'          => config('azure.authority').config('azure.tokenEndpoint'),
  //       'urlResourceOwnerDetails' => '',
  //       'scopes'                  => config('azure.scopes')
  //     ]);

  //     try {
  //       // Make the token request
  //       $accessToken = $oauthClient->getAccessToken('authorization_code', [
  //         'code' => $authCode
  //       ]);
  //       $tok=json_encode($accessToken);
  //         $tok=json_decode($tok);
  //         $token=$tok->access_token;





  //         $graph = new Graph();
  //       $graph->setAccessToken($accessToken->getToken());
  //       $ptr = $graph->createCollectionRequest("GET", "/me/messages")
  //              ->setReturnType(Model\Message::class)
  //              ->setPageSize(20);
  //       $msg= $ptr->getPage();
  //       $arr=json_encode($msg);
  //       $arr=json_decode($arr);

  //       $graph = new Graph();
  //       $graph->setAccessToken($accessToken->getToken());

  //       $user = $graph->createRequest('GET', '/me?$select=displayName,mail,mailboxSettings,userPrincipalName')
  //         ->setReturnType(Model\User::class)
  //         ->execute();

  //         $u=json_encode($user);
  //         $us=json_decode($u);
  //       $tokenCache = new TokenCache();
  //       $tokenCache->storeTokens($accessToken, $user);

  //       //return redirect('/');
  //       return view('layout', ['token'=>$token, 'us'=>$us]);
  //     }
  //     catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
  //       return redirect('/')
  //         ->with('error', 'Error requesting access token')
  //         ->with('errorDetail', json_encode($e->getResponseBody()));
  //     }
  //   }

  //   return redirect('/')
  //     ->with('error', $request->query('error'))
  //     ->with('errorDetail', $request->query('error_description'));
  // }

  public function signout()
    {
    Auth::logout();  
    $tokenCache = new TokenCache();
    $tokenCache->clearTokens();
    return redirect('/');
    }


public function header($token){

  
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);
  //  dd($arr2);
  return view('mail.header', compact('arr2', 'token'));
}

public function board($token)
{
  
            $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/mailFolders")
  ->setReturnType(Model\MailFolder::class)
  ->execute();

   $arr=json_encode($ptr);
   $arr2=json_decode($arr);

   $graph = new Graph();
   $graph->setAccessToken($token);
   $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEJAAA=/messages/")
             ->setReturnType(Model\Message::class)
             ->execute();
 
   $send=json_encode($ptr);
   $send=json_decode($send);

            return view('mail.board.task_board',compact('send','arr2','token'));
}

public function inbox($token, $parentFolderId){

  //dd($parentFolderId);
  // dd($token);
  $id=Session::get('user_id');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "https://graph.microsoft.com/v1.0/me/messages?top=150")
            ->setReturnType(Model\Message::class)
            // ->attachBody($arr)
            ->execute();
  $arr=json_encode($ptr);
  $arr1=json_decode($arr);
// dd($arr1);
  $data=$this->header($token);
  $arr2=$data->arr2;
  $arr2=(array)$arr2;
  // dd($arr2);
  $valll=[];
            $count=0;
            foreach ($arr1 as $value) {
                
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
                        $data->folder_id=$value1->parentFolderId;
                        $data->subject =$value1->subject;
                        $data->sender_name=$value1->sender->emailAddress->name??null;
                        $data->sender_email=$value1->sender->emailAddress->address??null;
                        $data->receiver_name=$value1->toRecipients[0]->emailAddress->name??null;
                          // 'category'=>cat??null,
                        //   $ptr = $graph->createCollectionRequest("GET", "/me/messages/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQBGAAAAAAC2FyRaMjr3QI4S4hLsOyjBBwBCmdKVgqrvQqshNpasfUyiAAAAAAEKAABCmdKVgqrvQqshNpasfUyiAAAYEXeEAAA=/attachments/")
                        //   ->setReturnType(Model\Message::class)
                        //   ->execute(),
                        //   $arr=json_encode($ptr),
                        //   $arr1=json_decode($arr),
                        // dd($ptr),
                        //   'attachment'=>$arr1[0]->name??null,
                        $data->date=$value1->createdDateTime;
                        $data->discription=$value1->body->content;
                        $data->colume_id= 1;
                        
                      }
                
            }
            // dd($valll);

  return view('mail.inbox',compact('arr1','token','arr2'));
}

public function trash($token, $parentFolderId){
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEKAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            //dd($ptr);
  $arr=json_encode($ptr);
  $arr1=json_decode($arr);

  $data=$this->header($token);
  $arr2=$data->arr2;
  return view('mail.trash', ['arr2'=>$arr2 ,'arr1'=>$arr1, 'token'=>$token]);
}

public function archive($token, $parentFolderId){
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEpAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            //dd($ptr);
  $arr=json_encode($ptr);
  $arr1=json_decode($arr);

  $data=$this->header($token);
  $arr2=$data->arr2;
  return view('mail.archive', ['arr2'=>$arr2 ,'arr1'=>$arr1, 'token'=>$token]);
}

public function draft($token, $parentFolderId){
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEPAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();
            // dd($ptr);
  $arr=json_encode($ptr);
  $arr1=json_decode($arr);

  $data=$this->header($token);
  $arr2=$data->arr2;
  return view('mail.draft', ['arr2'=>$arr2 ,'arr1'=>$arr1, 'token'=>$token]);
}


public function send($token, $parentFolderId){

  $data=$this->header($token);
  $arr2=$data->arr2;
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEJAAA=/messages/")
            ->setReturnType(Model\Message::class)
            ->execute();

  $arr=json_encode($ptr);
  $arr1=json_decode($arr);
  //dd($arr2);
  return view('mail.send', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

    }

    public function junk($token, $parentFolderId){

      $data=$this->header($token);
      $arr2=$data->arr2;

      $graph = new Graph();
      $graph->setAccessToken($token);
      $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAETAAA=/messages/")
                ->setReturnType(Model\Message::class)
                ->execute();

      $arr=json_encode($ptr);
      $arr1=json_decode($arr);
      return view('mail.junk', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

        }

      public function outbox($token, $parentFolderId){

        $data=$this->header($token);
        $arr2=$data->arr2;
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAELAAA=/messages/")
                  ->setReturnType(Model\Message::class)
                  ->execute();

        $arr=json_encode($ptr);
        $arr1=json_decode($arr);
        return view('mail.outbox', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

          }

  public function history($token, $parentFolderId){

        $data=$this->header($token);
        $arr2=$data->arr2;
        //dd($arr2);
        $graph = new Graph();
        $graph->setAccessToken($token);
        $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAE6AAA=/messages/")
                  ->setReturnType(Model\Message::class)
                  ->execute();

        $arr=json_encode($ptr);
        $arr1=json_decode($arr);
        return view('mail.history', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

  }

  public function ali($token, $parentFolderId){
            //dd($token);

          $data=$this->header($token);
          $arr2=$data->arr2;
          //dd($arr2);
          $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAKaujrAAA=/messages/")
                    ->setReturnType(Model\Message::class)
                    ->execute();

          $arr=json_encode($ptr);
          $arr1=json_decode($arr);
          //dd($arr1);
          return view('mail.ali', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

  }

  public function faran($token, $parentFolderId){
                //dd($token);

            $data=$this->header($token);
            $arr2=$data->arr2;
            //dd($arr2);
            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAMHuO6AAA=/messages/")
                      ->setReturnType(Model\Message::class)
                      ->execute();

            $arr=json_encode($ptr);
            $arr1=json_decode($arr);
            //dd($arr1);
            return view('mail.faran', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

  }

  public function demo($token, $parentFolderId){
                    //dd($token);

            $data=$this->header($token);
            $arr2=$data->arr2;
            //dd($arr2);
            $graph = new Graph();
            $graph->setAccessToken($token);
            $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAMHuPGAAA=/messages/")
                      ->setReturnType(Model\Message::class)
                      ->execute();

            $arr=json_encode($ptr);
            $arr1=json_decode($arr);
            //dd($arr1);
            return view('mail.demo', ['arr1'=>$arr1, 'token'=>$token, 'arr2'=>$arr2]);

  }


public function detail($token, $id){
  //dd($id);
  $name=array(
    "IsRead"=> true
  );
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  //->AddHeaders("Content-Type" => "application/json")
  ->setReturnType(Model\Message::class)
  ->attachBody($name)
  ->execute();
  
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/messages")
         ->setReturnType(Model\Message::class)
         ->execute();
  // $msg= $ptr->getPage();
  $arr=json_encode($ptr);
  $arr=json_decode($arr);

  $data=$this->header($token);
  $arr2=$data->arr2;

  return view('mail.detail', ['arr'=>$arr, 'token'=>$token, 'id'=>$id, 'arr2'=>$arr2]);


    }



public function draft_detail($token, $id){

  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("GET", "/me/messages")
         ->setReturnType(Model\Message::class)
         ->execute();
  // $msg= $ptr->getPage();
  $arr=json_encode($ptr);
  $arr=json_decode($arr);

  $data=$this->header($token);
  $arr2=$data->arr2;

  return view('mail.draft_detail', ['arr'=>$arr, 'token'=>$token, 'id'=>$id, 'arr2'=>$arr2]);
}



  public function compose($token){

    $data=$this->header($token);
    $arr2=$data->arr2;

      return view('mail.compose', ['token'=>$token, 'arr2'=>$arr2]);

    }

    public function reply($token, $id){


    $graph = new Graph();
    $graph->setAccessToken($token);
    $ptr = $graph->createCollectionRequest("GET", "/me/messages")
            ->setReturnType(Model\Message::class)
            ->execute();
    // $msg= $ptr->getPage();
    $arr=json_encode($ptr);
    $arr=json_decode($arr);

    $data=$this->header($token);
    $arr2=$data->arr2;
    return view('mail.reply_mail', ['arr'=>$arr, 'token'=>$token, 'id'=>$id, 'arr2'=>$arr2]);
    }

    public function reply_message(Request $request){
      // dd($request->all());
      $id=$request->message_id;
      // dd($id);
      $token=Session::get('user_token');
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
      return Redirect::back()->with(['success' => 'Successfully send your email ']);
    }

    public function sendmail (EmailRequest $request){
      

      switch ($request->input('action')) {
        case 'send':
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
                    "address"=> "clickindaraz@gmail.com"
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
                // dd($request->all());
          $token=Session::get('user_token');
          $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/sendMail")
                 ->attachBody($folder_id)
                 ->execute();
      // $arr=json_encode($ptr);
      // $arr1=json_decode($arr);
      // dd($arr1);
          return Redirect::back()->with(['success' => 'Successfully send your email ']);
            break;

        case 'draft':
          $folder_id=[
            "subject"=>"Did you see last night's game?",
            "importance"=>"Low",
            "body"=>[
                "contentType"=>"HTML",
                "content"=>"They were <b>awesome</b>!"
            ],
            "toRecipients"=>[
                [
                    "emailAddress"=>[
                        "address"=>"imran4@gmail.com"
                    ]
                ]
                    ],
                    
                    ];
          $token=Session::get('user_token');
          $graph = new Graph();
          $graph->setAccessToken($token);
          $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/messages")
                 ->attachBody($folder_id)
                 ->execute();
                 return Redirect::back()->with(['success' => 'Successfully save your email in draft ']);
            break;
    }

      
    }
    

    public function forward_view (Request $request, $token, $id){
      //dd($id);
      $graph = new Graph();
      $graph->setAccessToken($token);
      $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/$id")
            ->setReturnType(Model\Message::class)
            ->execute();
      $arr=json_encode($ptr);
      $arr1=json_decode($arr);

      $data=$this->header($token);
      $arr2=$data->arr2;
      //dd($arr1);
      return view('mail.forward', ['arr1'=>$arr1, 'token'=>$token, 'id'=>$id, 'arr2'=>$arr2]);

    }

    public function forward (Request $request){
      //  dd($request->all());
       $mail=Mail::where('message_id',$request->forward_message_id )->first();
      //  dd($mail);
      // $graph = new Graph();
      // $graph->setAccessToken($token);
      // $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/$id")
      //       ->setReturnType(Model\Message::class)

      //       ->execute();
      // $arr=json_encode($ptr);
      // $arr1=json_decode($arr);

      $forward_msg= strip_tags($mail->discription);
      $forward_subject=$mail->subject;

      $details= [
        'title'=> $forward_subject,
        'body' =>$forward_msg,
      ];

      $array=[''];
      $count=0;
      foreach ($request->cc as $value) {
        $array[$count]=$value;
        $count++;
      }
      // dd($array);
      $res="'" . implode ( "', '", $array ) . "'";
      
      // dd($res);
      \Mail::to($request->email)
      ->cc(['amirtariq3@gmai.com', 'hktmobileaccessories@gmail.com'])
      ->send(new \App\Mail\Mail($details));

      return Redirect::back()->with(['success' => 'Your Mail Successfully Forwarded']);
    }

    public function delete (Request $request, $token, $id){

      //dd($token);
      $graph = new Graph();
      $graph->setAccessToken($token);
      $ptr = $graph->createCollectionRequest("DELETE", "https://graph.microsoft.com/v1.0/me/messages/$id")
            ->setReturnType(Model\Message::class)
            ->execute();
            //dd($ptr);
      return Redirect::back()->with(['success' => 'Your Mail Successfully Deleted']);


    }

    public function createFolder(Request $request, $token){


      $folder_id=
      [
        "displayName"=> $request->name
      ];
      $graph = new Graph();
      $graph->setAccessToken($token);
      $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/mailFolders")
             ->attachBody($folder_id)
             ->setReturnType(Model\MailFolder::class)
             ->execute();

      return Redirect::back()->with(['success' => 'Your Mail Folder Created Successfully']);


    }

    public function move(Request $request, $id, $folder){
         //dd($id);

      $folder_id=
      [
        "DestinationId"=> $folder
      ];
      $graph = new Graph();

      $token=Session::get('user_token');
      $graph->setAccessToken($token);


      $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/messages/$id/move")
            ->attachBody($folder_id)
            //->setReturnType(Model\MailFolder::class)
            ->execute();
            //dd($ptr);
            return Redirect::back()->with(['success' => 'Your Mail Moved Successfully']);
    }

}