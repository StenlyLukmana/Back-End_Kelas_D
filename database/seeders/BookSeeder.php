<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Harry Potter',
            'author' => 'J.K.Rowling',
            'price' => 150000,
            'release' => '1990/12/12',
            'image' => '',
            'category_id' => 3,
        ]);
    }
}
