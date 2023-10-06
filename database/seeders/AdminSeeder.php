<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => env("ADMIN_NAME"),
            'email' => env("ADMIN_EMAIL"),
            'email_verified_at' => now(),
            'password' => Hash::make(env("ADMIN_PASSWORD")),
        ]);
    }
}
