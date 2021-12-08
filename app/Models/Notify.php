<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'action',
        'message_id',
        'date'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function Message()
    {
    	return $this->belongsTo(Mail::class);
    }

    
}
