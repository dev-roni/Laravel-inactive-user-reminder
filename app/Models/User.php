<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserReminder;
use App\Models\Setting;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'last_login_at',
        'user_type',
        'password',
    ];

    public function reminders()
    {
        return $this->hasMany(UserReminder::class);
    }

    //use scope for find user who don't login 
    public function scopeInactive($query)
    {
        //The 'days' data will be fetched from the database
        $settings = Setting::first();
        $days = $settings ? $settings->inactive_days : 7;

        return $query->where(function ($q) use ($days) {
            $q->whereNull('last_login_at')
            ->orWhere('last_login_at', '<=', now()->subDays($days));
        });
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
