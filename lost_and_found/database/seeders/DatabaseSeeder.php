<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

\App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('password123'),
    
]);




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    public function run()
{
    $user = \App\Models\User::where('email', 'admin@example.com')->first();
    if ($user) {
        $user->is_admin = 1;
        $user->save();
    }
}


}
