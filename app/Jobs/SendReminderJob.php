<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use App\Models\UserReminder;

class SendReminderJob implements ShouldQueue
{
    use Queueable;

    public $user;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Reminder sent to user: " . $this->user->email);

        UserReminder::create([
            'user_id' => $this->user->id,
            'reminder_sent_at' => now(),
            'status' => 'sent'
        ]);
    }
}
