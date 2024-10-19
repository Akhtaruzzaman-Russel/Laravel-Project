<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Zaman',
        //     'email' => 'admin@gmail.com',
        //     'password' =>Hash::make('123456789'),
        //     'role_id' => 1,
        // ]);
        // User::create([
        //     'name' => 'Russel',
        //     'email' => 'user@gmail.com',
        //     'password' =>Hash::make('123456789'),
        //     'role_id' => 2,
        // ]);

        $users=[
            [
            'name' => 'Zaman',
             'email' => 'admin@gmail.com', 
             'password' => Hash::make('123456789'), 
             'role_id' => 1,
            ],

            [
                'name' => 'Russel',
                 'email' => 'user@gmail.com', 
                 'password' => Hash::make('123456789'), 
                 'role_id' => 2,
                ],




          
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}