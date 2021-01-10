<?php

namespace Database\Seeders;

use Str;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'phone' => '00201402548741',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'photo' => 'admin_profile.png',
            'address' => 'Egypt, Cairo',
            'remember_token' => Str::random(10)
        ]);
    }
}
