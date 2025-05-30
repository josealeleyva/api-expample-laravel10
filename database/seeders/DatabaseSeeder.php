<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User Superadministrador
        if (!\App\Models\User::where('email', 'superadmin1@yopmail.com')->exists())
            \App\Models\User::factory()->create([
                'name' => 'Superadmin',
                'email' => 'superadmin1@yopmail.com',
                'password' => Hash::make('1234')
            ]);


        $this->call([
            RolSeeder::class,
            PermisosSeeder::class,
        ]);
    }
}