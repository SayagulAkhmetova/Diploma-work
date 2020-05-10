<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Computer Science',
            'description' => 'Computer science is the study of processes that interact with data and that can be represented as data in the form of programs.'
        ]);
        \App\Category::create([
            'name' => 'Relational Database',
            'description' => 'A relational database is a digital database based on the relational model of data, as proposed by E. F. Codd in 1970.'
        ]);
        \App\Category::create([
            'name' => 'NoRelational Database',
            'description' => 'A non-relational database is a database that does not use the tabular schema of rows and columns found in most traditional database systems.'
        ]);
        \App\Category::create([
            'name' => 'UI/UX',
            'description' => 'User interface design or user interface engineering is the design of user interfaces for machines and software, such as computers, home appliances, mobile devices.'
        ]);
        \App\Category::create([
            'name' => 'Machine Learning',
            'description' => 'A non-relational database is a database that does not use the tabular schema of rows and columns found in most traditional database systems.'
        ]);
        \App\Category::create([
            'name' => 'Data Science',
            'description' => 'User interface design or user interface engineering is the design of user interfaces for machines and software, such as computers, home appliances, mobile devices.'
        ]);
    }
}
