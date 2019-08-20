<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Answer extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {
        $question = \App\Models\Question::findOrFail($question_id);

        $this->validate($request, [
            'content' => [
                'required',
                'min:5',
            ],
        ]);

        $answer = new \App\Models\Answer();
        $answer->fill($request->all());
        $answer->question()->associate($question);
        $answer->save();

        return redirect(route('question.show', $question->id));
    }

}
