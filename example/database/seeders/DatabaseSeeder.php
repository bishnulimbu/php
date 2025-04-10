<?php

namespace Database\Seeders;

use App\Models\Job;
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
        User::factory(10)->create();
        Job::factory(10)->create();
        echo"seeder ran for 10 dummby data for user and job.";

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(TagSeeder::class);//for calling the custom class
    }
    // $this->info("seeder ran for 10 dummby data for user and job.");will not work in seeder works onlly with artisan commands.
}
