<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'inactive_days' => 7,
                'paid_user_message' => 'By staying away for 7 days, you are losing valuable subscription time and stalling the progress you have already paid for.',
                'general_user_message' => 'You are losing your daily momentum and missing out on new updates that could accelerate your progress'
            ]
        );
    }
}
