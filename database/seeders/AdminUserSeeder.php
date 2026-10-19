<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
/*  */
class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@cargolink.test',
        ]);

        $admin->name = 'CargoLink Admin';
        $admin->password = 'password';
        $admin->email_verified_at = now();
        $admin->role = 'admin';
        $admin->save();
    }
}