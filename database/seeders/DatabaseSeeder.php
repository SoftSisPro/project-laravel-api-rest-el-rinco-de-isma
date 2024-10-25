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
            'email' => 'jacajali@gmai.com',
            'password' => bcrypt('12345')
        ]);

        $this->call([
            CustomerSeeder::class,
        ]);
    }
}
