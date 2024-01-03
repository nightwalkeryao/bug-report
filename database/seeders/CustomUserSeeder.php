<?php

namespace Database\Seeders;

use App\Models\CustomUserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!CustomUserModel::count()) {
            $user = CustomUserModel::factory()->count(1)->create();

            $this->command->line("\nCustom user created :");
            $this->command->info("email: " . $user->first()->custom_email_column . "\npassword: password");
        } else {
            $this->command->line("\nCustom user already exists:");
            $this->command->info("email: " . CustomUserModel::first()->custom_email_column . "\npassword: password");
        }
    }
}
