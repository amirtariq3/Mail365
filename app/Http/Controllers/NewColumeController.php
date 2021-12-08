<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Session;
use Redirect;
use Auth;
use Carbon\Carbon;
use App\Models\Mail;
use App\Models\Notify;
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

class NewColumeController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $id=Session::get('user_id');
        // dd($id);
        $data= new Custom_Mail;
        $data->user_id= $id;
        $data->col_name= $request->name;
        $user = Auth::user();
          if ($data->save()) {
            $u = Notify::create([
                'user_id'    => $user->id,
                'message_id' => null,
                'action'     => $user->name.' Added New Column '.$request->name,
                'date'       => Carbon::now()
            ]);
        }
        return Redirect::back();
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function delete($id)
    {
        $mail=Mail::where('colume_id',$id)->get();
        $count=count($mail);
        if ($count > 0) {
            echo "<script>";
            echo "alert('you does not delete that column untill all cards are moved');";
            echo "</script>";
            // return Redirect::back();
        }
        else{

            echo "<script>";
            echo "alert('are you sure you want to delete');";
            echo "</script>";
            $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mail::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mail::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        
        }
        $user = Auth::user();
        $u = Notify::create([
            'user_id'    => $user->id,
            'message_id' => null,
            'action'     => $user->name.' Delete Column '.$data->col_name,
            'date'       => Carbon::now()
        ]);
        
        return Redirect::back();
    }

    public function delete_card($id)
    {
        $mail=Mail::where('id', $id)->update([

            'status' => "0"

          ]);
        $subject=Mail::find($id);
        if ($mail) {
            $user = Auth::user();
             $u = Notify::create([
            'user_id'    => $user->id,
            'message_id' => $id,
            'action'     =>  $user->name.' delete card '. $subject->subject,
            'date'       => Carbon::now()
        ]);
        }  
        return Redirect::back();
    }

    public function update_colume(Request $request)
    {
        $data=Custom_Mail::where('id', $request->col_id)->update([

            'col_name'   => $request->col_name
    
            ]);
        return Redirect::back();
    }
    
    public function delete_ali($id)
    {
        $mail=Mails_ali::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_ali::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_ali::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_archive($id)
    {
        $mail=Mails_archive::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_archive::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_archive::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_conversation_history($id)
    {
        $mail=Mails_conversation_history::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_conversation_history::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_conversation_history::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_deleted_items($id)
    {
        $mail=Mails_deleted_items::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_deleted_items::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_deleted_items::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_demo($id)
    {
        $mail=Mails_demo::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_demo::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_demo::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_drafts($id)
    {
        $mail=Mails_drafts::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_drafts::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_drafts::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_faran($id)
    {
        $mail=Mails_faran::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_faran::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_faran::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_farann($id)
    {
        $mail=Mails_farann::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_farann::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_farann::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_junk_email($id)
    {
        $mail=Mails_junk_email::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_junk_email::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_junk_email::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }
    public function delete_send_items($id)
    {
        $mail=Mails_send_item::where('colume_id', $id)->get();
        $data=Custom_Mail::find($id);
        if ($data->delete()) {
            
            $mail=Mails_send_item::where('colume_id', $id)->get();
            $array=[];
            $count=0;
            foreach ($mail as $key=> $value) {

                $array[$count]=$value;
                Mails_send_item::where('colume_id', $value->colume_id)->update([

                    'colume_id' => "1"

                  ]);
                $count++;
            }
        }
        return Redirect::back();
    }

    public function done_card($id)
    {
        // dd($id);
        $data=Mail::find($id)->update([

            'colume_id' => "4"

          ]);
        $user = Auth::user();
        $mail=Mail::find($id);
          if ($data) {
            $u = Notify::create([
                'user_id'    => $user->id,
                'message_id' => $id,
                'action'     => $user->name.' Move Card to Done '. $mail->subject,
                'date'       => Carbon::now()
            ]);
        }
          return Redirect::back();
    }
    
}
