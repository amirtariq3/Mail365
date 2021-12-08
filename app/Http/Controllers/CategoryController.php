<?php

namespace App\Http\Controllers;

use App\TokenStore\TokenCache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ReplyEmailRequest;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Mail;
use Redirect;
use Arr;
use Session;
use Carbon\Carbon;
use ConvertId;

class CategoryController extends Controller
{
  public function add_category(Request $request)
  {
    
    
     $token=Session::get('user_token');
     //dd($token);
     $name=
     [
       "displayName"=> $request->name
     ];
     $graph = new Graph();
     $graph->setAccessToken($token);
     $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/outlook/masterCategories")
     ->attachBody($name)
     //->setReturnType(Model\CategoryColor::class)
     ->execute();
     return Redirect::back()->with(['success' => 'Your Category Created Successfully']);
    
    
  }
  public function edit_category(Request $request)
  {
    
    if($request->edit_Category)
    {
    $data=category();
    
    foreach($data as $k=>$cat)
    {
      // dd($data[$k]["displayName"]);
      if($request->edit_category==$data[$k]['displayName'])
      {
        $id=$data[$k]['id'];
        $token=Session::get('user_token');
        $graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("DELETE", "https://graph.microsoft.com/v1.0/me/outlook/masterCategories/$id")
->execute();
        
      }
    }
    if($id)
    {
      
$category=array(
  // "title"=>$request->edit_Category
           "displayName"=>$request->edit_Category
          //  "color" => "preset0"
        );
        $category=json_encode($category);
$hdr=["Content-Type"=>"application/json"];
$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/outlook/masterCategories")
->AddHeaders($hdr)
//->setReturnType(Model\Message::class)
->attachBody($category)
->execute();


}

}
return Redirect::back()->with(['success' => 'Your Category is Updated Successfully']);
  }
  public function delete_category(Request $request)
  {
    if($request->delete_Category)
    {
      
    $data=category();
    
    foreach($data as $k=>$cat)
    {
      
      if($request->delete_Category==$data[$k]['displayName'])
      {
        $id=$data[$k]['id'];
        $token=Session::get('user_token');
        $graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("DELETE", "https://graph.microsoft.com/v1.0/me/outlook/masterCategories/$id")
->execute();
        
      }
    }
   

}
return Redirect::back()->with(['success' => 'Your Category is Deleted Successfully']);
  }
  public function assign(Request $req,$id)
  {
    
    // if($req->cat)
    
    //dd($req->cat);
    //Session::put('categories',$req->cat);
    //dd(Session::get('categories'));
    if($req->cat)
    {
      $cat=[];
      foreach($req->cat as $k=>$v)
      {
        $cat[$k]=$v;
      }
      //dd($cat);
      $name=array("categories"=> $cat,
      "IsRead"=> true
    );
    $name=json_encode($name);
  }
  else
  {
    $cat=[];
    $name=array("categories"=> $cat,
    "IsRead"=> false
  );
  $name=json_encode($name);
}


$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
//->AddHeaders("Content-Type" => "application/json")
//->setReturnType(Model\Message::class)
->attachBody($name)
->execute();

return Redirect::back()->with(['success' => 'Your Category Assign Successfully']);
}
  public function unassign($id)
  {
    $name=array("categories"=> [],
    //"IsRead"=> true,
  );
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  //->AddHeaders("Content-Type" => "application/json")
  //->setReturnType(Model\Message::class)
  ->attachBody($name)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Category Un-Assign Successfully']);

  }
  public function unread($id)
  {
    $name=array(
      "IsRead"=> false
    );
    $token=Session::get('user_token');
    $graph = new Graph();
    $graph->setAccessToken($token);
    $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
    //->AddHeaders("Content-Type" => "application/json")
    //->setReturnType(Model\Message::class)
    ->attachBody($name)
    ->execute();
    return Redirect::back()->with(['success' => 'Your Message Mark-as-unread Successfully']);
    
  }
  public function read($id)
  {
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
    return Redirect::back()->with(['success' => 'Your Message Mark-as-read Successfully']);
  }
  public function copy(Request $request, $id, $folder)
  {
    $folder_id=
    [
      "DestinationId"=> $folder
    ];
    $graph = new Graph();
    $token=Session::get('user_token');
    $graph->setAccessToken($token);
    $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/messages/$id/copy")
    ->attachBody($folder_id)
    //->setReturnType(Model\MailFolder::class)
    ->execute();
    //dd($ptr);
    return Redirect::back()->with(['success' => 'Your Mail Copied Successfully']);
  }

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



public function searchCategory(Request $request)
{
    $graph = new Graph();
    $token=Session::get('user_token');
    $data=$this->header($token);
    $arr2=$data->arr2;

    $graph->setAccessToken($token);
    $ptr = $graph->createCollectionRequest("GET", "/me/mailFolders/AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=/messages/")
              ->setReturnType(Model\Message::class)
              ->execute();

    $arr=json_encode($ptr);
    $arr1=json_decode($arr);

    for ($i=0; $i < count($arr1); $i++) {
        for ($j=0; $j <count($arr1[$i]->categories); $j++) {

            $vall=array();
            if($request->category==$arr1[$i]->categories[$j]){
                $valll[]=$arr1[$i];
            }

        }
    }


   if(isset($valll))
   {
       return view('mail.search_category',compact('arr2','token','valll'));
   }
   else
   {
       return redirect()->back()->with('message','This Category doesnt  Assign');
   }
}

public function flag($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t);
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>null,
    "flagStatus"=> "flagged",
    "StartDateTime"=>null
    ]
  ];
  $token=Session::get('user_token');
  $status=json_encode($status);
  $hdr=["Content-Type"=>"application/json"];
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
  
}
public function flag_today($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t);
  $carbon=Carbon::now();
  $c=$carbon->toArray();
  $hour=23-$c['hour'];
  $minute=59-$c['minute'];
  $second=60-$c['second'];
  $carbon=$carbon->addHours($hour)->addMinutes($minute)->addSeconds($second);
  $dt=$carbon->toDateString()."T".$carbon->toTimeString();
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>[
      "dateTime"=>$dt,
      "timeZone"=>"UTC"
    ],
    "flagStatus"=> "flagged",
    "StartDateTime"=>[
      "dateTime"=>$datetime,
      "timeZone"=>"UTC"
      ]
      ]
    ];
    $status=json_encode($status);
    $hdr=["Content-Type"=>"application/json",
    // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
  ];
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
}
public function flag_tomorrow($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t);
  $carbon=Carbon::now();
  $c=$carbon->toArray();
  $hour=23-$c['hour'];
  $minute=59-$c['minute'];
  $second=60-$c['second'];
  $carbon=$carbon->addHours($hour)->addMinutes($minute)->addSeconds($second)->addDay();
  $dt=$carbon->toDateString()."T".$carbon->toTimeString();
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>[
      "dateTime"=>$dt,
      "timeZone"=>"UTC"
    ],
    "flagStatus"=> "flagged",
    "StartDateTime"=>[
      "dateTime"=>$datetime,
      "timeZone"=>"UTC"
      ]
      ]
    ];
    $status=json_encode($status);
    $hdr=["Content-Type"=>"application/json",
    // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
  ];
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
}
public function flag_this_week($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t); $c=Carbon::now();
  $check=$c->toArray();
  $c=$check['dayOfWeek'];
  if($c==1)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(7);
  }
  elseif($c==2)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(6);
  }
  elseif($c==3)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(5);
  }
  elseif($c==4)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(4);
  }
  elseif($c==5)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(3);
  }
  elseif($c==6)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(2);
  }
  elseif($c==7)
  {
    $carbon=Carbon::now();
    $hour=23-$check['hour'];
    $minute=59-$check['minute'];
    $second=60-$check['second'];
    $carbon=$carbon->addHours($hour)->addMinutes($minute)->addSeconds($second);
  }
  $dt=$carbon->toDateString()."T".$carbon->toTimeString();
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>[
      "dateTime"=>$dt,
      "timeZone"=>"UTC"
    ],
    "flagStatus"=> "flagged",
    "StartDateTime"=>[
      "dateTime"=>$datetime,
      "timeZone"=>"UTC"
      ]
      ]
    ];
    $status=json_encode($status);
    $hdr=["Content-Type"=>"application/json",
    // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
  ];
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
}
public function flag_next_week($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t);$c=Carbon::now();
  $check=$c->toArray();
  $c=$check['dayOfWeek'];
  if($c==1)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(7);
    $carbon=$carbon->addWeek();
  }
  elseif($c==2)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(6);
    $carbon=$carbon->addWeek();
  }
  elseif($c==3)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(5);
    $carbon=$carbon->addWeek();
  }
  elseif($c==4)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(4);
    $carbon=$carbon->addWeek();
  }
  elseif($c==5)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(3);
    $carbon=$carbon->addWeek();
  }
  elseif($c==6)
  {
    $carbon=Carbon::today();
    $carbon=$carbon->addDays(2);
    $carbon=$carbon->addWeek();
  }
  elseif($c==7)
  {
    $carbon=Carbon::now();
    $hour=23-$check['hour'];
    $minute=59-$check['minute'];
    $second=60-$check['second'];
    $carbon=$carbon->addHours($hour)->addMinutes($minute)->addSeconds($second);
    $carbon=$carbon->addWeek();
  }
  $dt=$carbon->toDateString()."T".$carbon->toTimeString();
  
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>[
      "dateTime"=>$dt,
      "timeZone"=>"UTC"
    ],
    "flagStatus"=> "flagged",
    "StartDateTime"=>[
      "dateTime"=>$datetime,
      "timeZone"=>"UTC"
      ]
      ]
    ];
    $status=json_encode($status);
    $hdr=["Content-Type"=>"application/json",
    // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
  ];
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
}
public function flag_no_date($id)
{
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>null,
    "flagStatus"=> "flagged",
    "StartDateTime"=>null
    ]
  ];
  $status=json_encode($status);
  $hdr=["Content-Type"=>"application/json",
  // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
];
$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
->AddHeaders($hdr)
//->setReturnType(Model\Message::class)
->attachBody($status)
->execute();
return Redirect::back()->with(['success' => 'Your Message is Flagged Successfully']);
}

public function flag_clear_flag($id)
{
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>null,
    "flagStatus"=> "notFlagged",
    "StartDateTime"=>null
    ]
  ];
  $status=json_encode($status);
  $hdr=["Content-Type"=>"application/json",
  // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
];
$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
->AddHeaders($hdr)
//->setReturnType(Model\Message::class)
->attachBody($status)
->execute();
return Redirect::back()->with(['success' => 'Your Message is Un-Flagged Successfully']);
}
public function flag_clear_complete()
{
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>null,
    "flagStatus"=> "notFlagged",
    "StartDateTime"=>null
    ]
  ];
  $status=json_encode($status);
  $hdr=["Content-Type"=>"application/json",
  // "Prefer"=> 'outlook.timezone="Asia/Karachi"'        
];
$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
->AddHeaders($hdr)
//->setReturnType(Model\Message::class)
->attachBody($status)
->execute();
return Redirect::back()->with(['success' => 'Your Message is Un-Flagged Successfully']);
}
public function unflag($id)
{
  $status=["flag"=>[
    "completedDateTime"=>null,  
    "dueDateTime"=>null,
    "flagStatus"=> "notFlagged",
    "StartDateTime"=>null
    ]
  ];
  $status=json_encode($status);
  $hdr=["Content-Type"=>"application/json"];
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->AddHeaders($hdr)
  //->setReturnType(Model\Message::class)
  ->attachBody($status)
  ->execute();
  return Redirect::back()->with(['success' => 'Your Message is UnFlagged Successfully']);
}
public function complete($id)
{
  $d=Carbon::now()->toDateString();
  $t=Carbon::now()->toTimeString();
  $datetime=($d."T".$t);
  $status=["flag"=>[ "flagStatus"=> "complete",
  "completedDateTime"=>[
    "dateTime"=>$datetime,
    "timeZone"=>"UTC"
  ],
  "dueDateTime"=>null,
  "StartDateTime"=>null
  ]
];
$status=json_encode($status);
$hdr=["Content-Type"=>"application/json"];
$token=Session::get('user_token');
$graph = new Graph();
$graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
->AddHeaders($hdr)
//->setReturnType(Model\Message::class)
->attachBody($status)
->execute();
return Redirect::back()->with(['success' => 'Your Message is Marked as Completed Successfully']);
}

public function pin($id)
{
  // $status=array("inferenceClassification"=>"other");
  // $status=array("expand"=>["_MarkAsFinal"=>1]);
  // $status=array("importance"=>'normal');
  // $status=array("isFavorited"=>1);
  // $status=["expand"=>["classifyAs"=> "pinned"]];
  // $status=["addFavorite"=>["IsBound"=>"true"]];includeNestedFolders;"includeDeletedItems"=>true
  // $status=["sourceFolderIds"=>"AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA%3D"];
  // $id=urlencode(strtolower("AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA="));
  // $id=urlencode("AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=");
  // $id2="AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=";
  // dd(urlencode("AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA%3D"));die;
  // $status=["mailSearchFolder"=>["sourceFolderIds"=>["2"=>["id"=>$id,
                                                        
  // ]],
  // "includeNestedFolders"=>true,
  // "includeDeletedItems"=>true
  
  // ]
  //  ];
  // $status=["sourceFolderIds"=>[2=>["id"=>$id,
                                                        
  // ]],
  // "includeNestedFolders"=>true,
  // "includeDeletedItems"=>true
  
  
  //  ];
  // $status=["sourceFolderIds"=>$id
  //  ];
  //$id=urldecode($id);
  // dd($id);die;

  //preg_match('/itm:n#_(\d*)/', $id2 , $matches);
  //dd(matches['0']);die;
  // $status=array("sourceFolderIds"=>['DestinationId'=>$id]);
  // dd($id);
  // ConvertId("AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=");
  
//   $_FolderId="AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=";
//   $HexEntryId = [System.BitConverter]::ToString([Convert]::FromBase64String($_.FolderId.ToString())).Replace("-","").Substring(2)  ;
// $HexEntryId =  $HexEntryId.SubString(0,($HexEntryId.Length-2));
//   dd($HexEntryId);
//   $status=array("sourceFolderIds"=>['id'=>$id]);
  // "singleValueLegacyExtendedProperty"
  // $status=array('name'=>"inbox");
  // $status=array("sourceFolderIds"=>['parentFolderId'=>"AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA%3D"]);
  // $status=array('Id'=>$id);


  // $checkid=[
  //   "inputIds" => [
  //     "AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEJAAA=",
  //     "AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA="
  //   ],
  //   "sourceIdType"=> "ewsId",
  //   // "targetIdType"=> "ewsId"
  //   "targetIdType"=> "entryId"
  // ];
  // $token=Session::get('user_token');
  // $hdr=["Content-Type"=>"application/json"];
  // $checkid=json_encode($checkid);
  // $graph = new Graph();
  // $graph->setAccessToken($token);
  //  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/mailFolders/Favorite")
  // $ptr = $graph->createCollectionRequest("POST", "https://graph.microsoft.com/v1.0/me/translateExchangeIds")
  //  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  // ->AddHeaders($hdr)
  // ->setReturnType(Model\Message::class)
  // ->attachBody($checkid)
  // ->execute();
  
  // dd($ptr);die;
  
  // $status=array("sourceFolderIds"=>["id"=>"AAAAALYXJFoyOvdAjhLiEuw7KMEBAEKZ0pWCqu9CqyE2lqx9TKIAAAAAAQwAAA2"]);
  // $token=Session::get('user_token');
  // $hdr=["Content-Type"=>"application/json"];
  // $status=json_encode($status);
  // $graph = new Graph();
  // $graph->setAccessToken($token);
  //  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/mailFolders/Favorite")
  // // $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/mailFolders/Favorites")
  
  // ->AddHeaders($hdr)
  // ->setReturnType(Model\Message::class)
  // ->attachBody($status)
  // ->execute();

// dd($ptr);
  $status=array("inferenceClassification"=>"other");
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
$ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
->attachBody($status)
  ->execute();
  $parentFolderId="AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=";
  
  return redirect()->route('inbox',compact('token','parentFolderId'));
}

public function unpin($id)
{
  // $status=array("_MarkAsFinal"=>0);
  $status=array("inferenceClassification"=>"focused");
  $token=Session::get('user_token');
  $graph = new Graph();
  $graph->setAccessToken($token);
  $ptr = $graph->createCollectionRequest("PATCH", "https://graph.microsoft.com/v1.0/me/messages/$id")
  ->attachBody($status)
  ->execute();
  $parentFolderId="AAMkADQ0MTA1YWZmLTdhMjAtNDM5OS1hODc4LTQwYmRmMTA1NjIwZQAuAAAAAAC2FyRaMjr3QI4S4hLsOyjBAQBCmdKVgqrvQqshNpasfUyiAAAAAAEMAAA=";
  
  return redirect()->route('inbox',compact('token','parentFolderId'));
}

}
