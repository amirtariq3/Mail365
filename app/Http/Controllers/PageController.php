<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create()
    {
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
    }
}
