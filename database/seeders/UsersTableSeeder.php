<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => 'John Doe',
            'email' => 'johndoe@email.com',
            'password' => Hash::make('my_pass')
        ];

        \App\Models\User::create($params);
    }
}
