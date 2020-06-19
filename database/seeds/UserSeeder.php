<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'user_role_id' => 1,
                'email' => 'admin@admin.com',
                'phone' => '08123123123',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'drafter',
                'user_role_id' => 2,
                'email' => 'drafter@drafter.com',
                'phone' => '0812312312',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'pelaksana',
                'user_role_id' => 3,
                'email' => 'pelaksana@pelaksana.com',
                'phone' => '08123123132',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'direktur',
                'user_role_id' => 4,
                'email' => 'direktur@direktur.com',
                'phone' => '0812312312321',
                'password' => Hash::make('123456789'),
            ],
            
        ]);
    }
}
