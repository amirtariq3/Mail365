<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mail extends Model
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'colume_id',
        'message_id',
        'user_id',
        'folder_id',
        'subject',
        'sender_name',
        'sender_email',
        'receiver_name',
        'category',
        'date',
        'discription',
        'status'
    ];

    public function notify(){

        return $this->hasMany(Notify::class);
  
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class,'message_id','id');
    }
    
    public function Todo()
    {
        return $this->hasMany(Todo::class,'message_id','id');
    }


}
