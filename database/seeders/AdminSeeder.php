<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    public function run(): void
    {
   
        $user = User::create([
            'name' => 'Geeky ThankGod',
            'email' => 'geeky@gmail.com',
            'password' => bcrypt('geeky@gmail.com'),
            'status' => 'unblock',
            'role' => 'admin',
        ]);
    }
}
