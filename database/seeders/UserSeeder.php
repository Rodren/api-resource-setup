<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'John Doe', 
            'email' => 'john@example.com', 
            'password' => bcrypt('password')
        ]);

        $user->createToken('JohnDoe')->plainTextToken;

        User::factory()->count(5)->create();
    }
}
