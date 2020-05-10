<?php

use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Alimzhan Baimuratov',
            'email' => 'alimzhan@sdu.edu.kz',
            'password' => bcrypt('secret'),
            'head_of_department' => 'Phd Azamat Zhamanov',
            'department' => 'Department of Computer Science',
            'title' => 'Associate Professor SDU',
            'degree' => 'Phd',
        ]);
    }
}
