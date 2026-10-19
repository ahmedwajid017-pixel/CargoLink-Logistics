<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            $this->command->warn('No users found. Register a user first.');
            return;
        }

        $messages = [
            'Welcome to CargoLink Logistics.',
            'Your account is ready to use.',
            'Remember to upload your shipping documents.',
        ];

        foreach ($messages as $message) {
            Notification::firstOrCreate([
                'member_id' => $user->id,
                'message' => $message,
            ]);
        }

        $this->command->info('Sample notifications created.');
    }
}