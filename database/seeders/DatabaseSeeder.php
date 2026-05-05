<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //Super Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'info@webbitech.com',
            'role' => 'admin',
            'password' => Hash::make('Info@2026'),
        ]);
        // Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'seo.webbitech@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Seo@2026'),
        ]);

        // Staff
        User::factory()->create([
            'name' => 'Sub Admin',
            'email' => 'shanmugapriyaawebbitech@gmail.com',
            'role' => 'subadmin',
            'password' => Hash::make('Seo@forEver'),
        ]);

        User::factory()->create([
            'name' => 'Sub Admin',
            'email' => 'gowthamjos.webbitech@gmail.com',
            'role' => 'subadmin',
            'password' => Hash::make('Seo@WebbTech!'),
        ]);
    }
}
