<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendReminderJob;
use App\Models\User;

class SendInactiveUserReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inactive-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders to inactive users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Checking for users who haven't been sent a reminder ‍and dispatch into job for other operation
        User::inactive()
            ->whereDoesntHave('reminders', function ($q) {
                $q->whereDate('reminder_sent_at', today());
            })
            ->chunkById(100, function ($users) {
                foreach ($users as $user) {
                    SendReminderJob::dispatch($user);
                }
            });

        $this->info('Inactive user reminder jobs dispatched.');
    }
}
