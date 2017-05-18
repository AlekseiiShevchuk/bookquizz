<?php

use Illuminate\Database\Seeder;

class BookSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'book_code' => 2134234, 'author' => 'dsfgdsg', 'title' => null, 'description' => null,],

        ];

        foreach ($items as $item) {
            \App\Book::create($item);
        }
    }
}
