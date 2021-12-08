<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custom_Mail extends Model
{
    use HasFactory;
    Protected $table= 'custom_mails';

    protected $fillable = [
        'user_id',
        'col_name'
    ];

    // public function mail()
    // {
    //     return $this->hasMany(Mail::class);
    // }

    public function ColumnMail()
    {
        return $this->hasMany(Mail::class,'colume_id','id');
    }

}
