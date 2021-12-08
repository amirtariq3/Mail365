<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'designation',
        'email',
        'phone',
        'phone1',
        'company_logo',
        'company_url',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'facebook_image',
        'twitter_image',
        'linkedin_image',
        'contact_url',
        'contact_image',
        'discription'

    ];
}
