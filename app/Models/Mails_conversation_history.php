<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails_conversation_history extends Model
{
    use HasFactory;
    protected $table='mails_conversation_history';
    protected $fillable = [
        'id',
        'message_id',
        'user_id',
        'subject',
        'sender_name',
        'receiver_name',
        'category',
        'date',
        'description',
        'colume_id',
        'status'
    ];

}
