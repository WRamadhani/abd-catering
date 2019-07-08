<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder {
    public function run() {
        User::create([
        		'username' => '@kami60',
        		'password' => Hash::make('12345678'),
        		'role' => 'admin',
        ]);

        User::create([
            'username' => '@rohimpaker',
            'password' => Hash::make('abdrohim'),
            'role' => 'catering',
        ]);

        User::create([
            'username' => '@wildanmz',
            'password' => Hash::make('abdwildan'),
            'role' => 'user',
        ]);
    }
}
