<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'compay_name' => 'Software Company',
            'email' => 'admin@google.com',
            'mobile' => '022334455',
            'address' => 'Bangladesh',
            'logo' => 'logo.png',
            'creator' => 1,
         // 'created_at' => now(),
         // 'updated_at' => now(),


        ]);
    }
}
