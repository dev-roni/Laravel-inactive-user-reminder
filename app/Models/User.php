<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserReminder;

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

    public function scopeInactive($query)
    {
        $days = 1;

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
