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

/* 
$poll = new Poll();
$poll->name = $input['poll-name'];

$question = new Question();
$question->name = $input['question-name'];

$poll->save();
$poll->question()->save($question);

foreach($input['choices'] as $choice_name)
{
    if(!$choice_name)
        continue;

    $choice = new Choice();
    $choice->name = $choice_name;
    $question->choices()->save($choice);
}
 */