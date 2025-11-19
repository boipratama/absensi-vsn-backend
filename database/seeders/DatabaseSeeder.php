<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Boy Admin',
            'email' => 'boypratama@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        // Data Dummy Company
        \App\Models\Company::create([
            'name' => 'PT. Visionet Data Internasional',
            'email' => 'vidia@visionet.co.id',
            'address' => 'Jl. Pak Kasih, Gang Merak 3 No.77, Kel. Mariana, Pontianak',
            'latitude' => '-0.0200938',
            'longitude' => '109.3309565',
            'radius_km' => '30',
            'time_in' => '08:00:00',
            'time_out' => '17:00:00',
        ]);

        $this->call([
            AttendanceSeeder::class,
        ]);
    }
} 
