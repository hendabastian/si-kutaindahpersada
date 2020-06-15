<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::insert([
            [
                'deskripsi' => 'Admin',
            ],
            [
                'deskripsi' => 'Drafter'
            ],
            [
                'deskripsi' => 'Pelaksana'
            ],
            [
                'deskripsi' => 'Direktur'
            ],
            [
                'deskripsi' => 'Konsumen'
            ]
        ]);
    }
}
