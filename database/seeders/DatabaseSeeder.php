<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Detail;
use App\Models\Login;
use App\Models\Laporan;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword,
            'login_email' => 'fathurwalkers44@gmail.com',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
