<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update specific users to admin status by email
        // Replace these emails with your actual admin emails
        $adminEmails = [
            'test@gmail.com',
            // Add more admin emails as needed
        ];

        foreach ($adminEmails as $email) {
            User::where('email', $email)->update(['is_admin' => true]);
        }
    }
}