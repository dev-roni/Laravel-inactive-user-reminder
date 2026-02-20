<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReminder extends Model
{
    protected $fillable = [
        'user_id',
        'reminder_sent_at',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
