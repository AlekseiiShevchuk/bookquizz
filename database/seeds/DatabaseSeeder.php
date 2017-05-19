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

        if (\App\Role::all()->first() == null) {
            $this->call(RoleSeed::class);
        }
        if (\App\User::all()->first() == null) {
            $this->call(UserSeed::class);
        }
        if (\App\Book::all()->first() == null) {
            $this->call(BookSeed::class);
        }
        if (\App\Quiz::all()->first() == null) {
            $this->call(QuizSeed::class);
        }
        if (\App\PossibleAnswer::all()->first() == null) {
            $this->call(PossibleAnswerSeed::class);
        }

    }
}
