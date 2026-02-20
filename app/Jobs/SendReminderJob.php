<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use App\Models\UserReminder;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use App\Services\SmsService;

class SendReminderJob implements ShouldQueue
{
    use Queueable;

    public $user;
    public $tries = 3;

    public function __construct($user)
    {
        $this->user = $user;
    }

   /*
    ==========sends an SMS via the SmsService========
    
    public function handle(SmsService $SmsService): void
    {
        //for send message
        $setting = Setting::first();
        $message = ($this->user->user_type === 'paid') ? $setting->paid_user_message : $setting->general_user_message;
        $phone = $this->user->phone;
        $SmsService->send($phone, $message);

        //for save log
        Log::info("Reminder sent to user: " . $this->user->email);

        //for reminder data save in database
        UserReminder::create([
            'user_id' => $this->user->id,
            'reminder_sent_at' => now(),
            'status' => 'sent'
        ]);
    }
    */

    public function handle(): void
    {
        //for save log
        Log::info("Reminder sent to user: " . $this->user->email);

        //for reminder data save in database
        UserReminder::create([
            'user_id' => $this->user->id,
            'reminder_sent_at' => now(),
            'status' => 'sent'
        ]);
    }
}
