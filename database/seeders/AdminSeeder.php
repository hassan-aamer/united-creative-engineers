<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =  User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => ['ar' => 'Admin'],
                'phone' => '0129730475',
                'role' => 'super admin',
                'address' => ['ar' => 'Riyadh, Saudi Arabia'],
                'position' => 1,
                'password' => Hash::make('password'),
                'updated_at' => now(),
            ]
        );
        $admin->assignRole('super admin');
    }
}
