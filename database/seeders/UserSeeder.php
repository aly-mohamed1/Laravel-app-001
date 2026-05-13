<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory(500)->create(); // Ctreatin 500 fake data
    }
}
