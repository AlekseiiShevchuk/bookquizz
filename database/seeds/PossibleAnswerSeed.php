<?php

use Illuminate\Database\Seeder;

class PossibleAnswerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'text' => 'Very good', 'quiz_id' => 1, 'is_correct' => 0,],
            ['id' => 2, 'text' => 'Good', 'quiz_id' => 1, 'is_correct' => 0,],
            ['id' => 3, 'text' => 'Not bad', 'quiz_id' => 1, 'is_correct' => 0,],
            ['id' => 4, 'text' => 'Bad', 'quiz_id' => 1, 'is_correct' => 0,],
            ['id' => 5, 'text' => 'Very Bad', 'quiz_id' => 1, 'is_correct' => 0,],
            ['id' => 6, 'text' => 'Super man', 'quiz_id' => 2, 'is_correct' => 0,],
            ['id' => 7, 'text' => 'Lady Gaga', 'quiz_id' => 2, 'is_correct' => 0,],
            ['id' => 8, 'text' => 'Bill Clinton', 'quiz_id' => 2, 'is_correct' => 1,],

        ];

        foreach ($items as $item) {
            \App\PossibleAnswer::create($item);
        }
    }
}
