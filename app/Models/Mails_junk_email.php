<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails_junk_email extends Model
{
    use HasFactory;
    protected $table='mails_junk_email';
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
