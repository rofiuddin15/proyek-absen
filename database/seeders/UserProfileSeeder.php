<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(["name" => "1234567890", "email" => "admin@gmail.com", "password" => Hash::make('12345678')]);
        UserProfile::create(["user_id" => $user->id,"first_name" => "Admin"]);
    }
}
