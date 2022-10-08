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
            'password' => bcrypt('ariel123'),
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'User Jonatan Lopez',
            'email' => 'ariel20jona@gmail.com',
            'password' => bcrypt('ariel123'),
            'role_id' => '2'
        ]);
    }
}
