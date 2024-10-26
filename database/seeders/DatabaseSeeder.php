<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'Jan Carlos Jaimes',
            'email' => 'jacajali@gmail.com',
            'password' => bcrypt('Carlos0723+')
        ]);

        $this->call([
            CustomerSeeder::class,
        ]);
    }
}
