<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Kanishka',
            'email' => 'kanishka1000+4@gmail.com',
            'password' => Hash::make('secret123'),
        ]);
    }
}
