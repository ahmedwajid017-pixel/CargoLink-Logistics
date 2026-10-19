<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->firstOrFail();

        $messages = [
            'Welcome to CargoLink Logistics.',
            'Your account is ready to use.',
            'Remember to upload your shipping documents.',
        ];

        foreach ($messages as $message) {
            Notification::firstOrCreate(
                [
                    'member_id' => $user->id,
                    'message' => $message,
                ],
                [
                    'read_at' => null,
                ]
            );
        }
    }
}