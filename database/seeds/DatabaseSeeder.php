<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(BookSeed::class);
        $this->call(QuizSeed::class);
        $this->call(PossibleAnswerSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);

    }
}
