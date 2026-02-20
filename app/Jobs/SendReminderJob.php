<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use App\Models\UserReminder;
use Illuminate\Support\Facades\Log;

class SendReminderJob implements ShouldQueue
{
    use Queueable;

    public $user;
    public $tries = 3;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
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
