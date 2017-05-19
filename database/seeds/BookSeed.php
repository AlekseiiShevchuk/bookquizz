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

            [
                'id' => 1,
                'title' => 'Test book title',
                'book_code' => 2324,
                'author' => 'Aleksey Shevchuk',
                'description' => 'test book description',
                'front_cover' => '1495115823-adic_logo.jpg',
                'back_cover' => '1495115823-lorem_image.jpg',
            ],

        ];

        foreach ($items as $item) {
            \App\Book::create($item);
        }
    }
}
