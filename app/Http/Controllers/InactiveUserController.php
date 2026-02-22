<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserReminder;
use App\Models\Setting;

use Illuminate\Http\Request;

class InactiveUserController extends Controller
{
    public function inactiveUser(){
       $days = 7;

        $totalUsers = User::count();

        $inactiveUsers = User::inactive()->count();

        $remindersToday = UserReminder::whereDate('reminder_sent_at', today())->count();

        $recentReminders = UserReminder::with('user')
            ->latest()
            ->paginate(10);

        return view('dashboard', compact(
            'totalUsers',
            'inactiveUsers',
            'remindersToday',
            'recentReminders'
        ));
    }

    public function settings(){
        $settings = Setting::first();
        return view('settings', compact('settings'));
    }

    public function settings_store(Request $request)
    {
        $request->validate([
            'inactive_days' => 'required|integer|min:1|max:365',
            'paid_user_message' => 'required|string',
            'general_user_message' => 'required|string'
        ]);

        Setting::updateOrCreate(
            ['id' => 1],
            [
                'inactive_days' => $request->inactive_days,
                'paid_user_message' => $request->paid_user_message,
                'general_user_message' => $request->general_user_message
            ]
        );

        return back()->with('success', 'Settings saved successfully');
    }
}
