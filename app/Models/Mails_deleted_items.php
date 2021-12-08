<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails_deleted_items extends Model
{
    use HasFactory;
    protected $table='mails_deleted_items';
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
