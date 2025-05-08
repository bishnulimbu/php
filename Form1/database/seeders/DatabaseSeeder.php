<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\Post;
use App\Models\Todo;
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
        // User::factory(10)->create();
        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
            TodoSeeder::class,
            FormSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Subash Limbu',
            'email' => 'daosaintlord@gmail.com',
            'is_admin'=>1,
            'password'=>Hash::make('123123123'),
        ]);
    }
}
