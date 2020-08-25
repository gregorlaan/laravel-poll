<?php

use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Poll::class, 10)->create()->each(function ($poll) {
            $question = factory(App\Question::class)->make();
            $poll->question()->save($question);

            $choices = factory(App\Choice::class, 5)->make();
            $question->choices()->saveMany($choices);
        });
    }
}
