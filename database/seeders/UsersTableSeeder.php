<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Ariel Ramirez',
            'email' => 'ariel12jona@gmail.com',
            'password' => bcrypt('jonas123'),
            'role_id' => '1'
        ]);
    }
}
