<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Question;
use App\Choice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    public function show(Poll $poll)
    {
        return view('poll.show', compact('poll'));
    }

    public function create()
    {
        return view('poll.create');
    }
    
    public function index()
    {
        $polls = Poll::latest()->paginate(5);

        return view('poll.index', compact('polls'));
    }

    public function edit(Poll $poll)
    {
        //$this->authorize('update', $post);

        return view('poll.edit', compact('poll'));
    }

    public function store()
    {
        $input = request()->all();

        $rules = [
            'poll-name' => 'required',
            'question-name' => 'required',
            'choices.0' => 'required',
        ];

        $messages = [
            'choices.0.required' => 'At least one choice is required',
        ];

        $attributes = [
            'poll-name' => 'poll title',
            'question-name' => 'question',
        ];

        $validator = Validator::make($input, $rules, $messages, $attributes);

        if($validator->fails())
        {
            return redirect('poll/create')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
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
        }

        return redirect('/polls');
    }

    public function update(Poll $poll)
    {
        // TODO: Have to limit choices
        $input = request()->all();

        $rules = [
            'poll-name' => 'required',
            'question-name' => 'required',
            'choices' => 'required|min:1',
        ];

        $messages = [
            'choices.required' => 'At least one choice is required',
        ];

        $attributes = [
            'poll-name' => 'poll title',
            'question-name' => 'question',
        ];

        $validator = Validator::make($input, $rules, $messages, $attributes);

        if($validator->fails())
        {
            return redirect("/poll/{$poll->uuid}/edit")
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $poll->update(['name' => $input['poll-name']]);
            $poll->question->update(['name' => $input['question-name']]);

            foreach($input['choices'] as $uuid => $choice_name)
            {
                if(!$choice_name)
                    continue;

                $choice = Choice::where('uuid', $uuid)->firstOrFail();
                $choice->update(['name' => $choice_name]);
            }
        }

        return redirect('/poll/' . $poll->uuid);
    }
}
