<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'inactive_days',
        'paid_user_message',
        'general_user_message',
    ];
}
