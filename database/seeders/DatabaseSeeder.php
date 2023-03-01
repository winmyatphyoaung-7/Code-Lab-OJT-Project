<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09405118211',
            'gender' => 'male',
            'address' => 'Yangon',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '09405118211',
            'gender' => 'male',
            'address' => 'Yangon',
            'role' => 'user',
            'password' => Hash::make('user123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
    }
}
