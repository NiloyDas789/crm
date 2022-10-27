<?php

namespace Database\Seeders;

use App\Models\DropOff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            DemoDataSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            TimezoneSeeder::class,
            CurrencySeeder::class,
            TaskSeeder::class,
//            ContactSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        // DropOff::factory(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
