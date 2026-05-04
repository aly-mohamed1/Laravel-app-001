<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Aly Mohamed',
            'roles' => 'admin',
            'email' => 'alimohamed@gmail.com',
            'mobile' => '01007804688',
            'password' => 'password',
        ]);

        User::factory(10)->create(); // Ctreatin 10 fake data
    }
}
