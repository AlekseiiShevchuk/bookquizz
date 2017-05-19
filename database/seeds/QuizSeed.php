<?php

use Illuminate\Database\Seeder;

class QuizSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'type' => 'interview', 'question' => 'how is this book for you?', 'description' => 'please choose your impression after reading', 'book_id' => 1,],
            ['id' => 2, 'type' => 'test', 'question' => 'Who is  the main character of this book?', 'description' => 'Please choose the main character of this book', 'book_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Quiz::create($item);
        }
    }
}
