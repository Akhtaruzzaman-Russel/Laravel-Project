<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Admin ',
            // 'email' => 'test@example.com',
            // 'mobile' => '01234567890',
            // 'pic' => '123 Main St',


        ]);
        Role::create([
            'role_name' => 'User',


        ]);
    }
}
