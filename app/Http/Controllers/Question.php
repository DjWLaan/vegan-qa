<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Question extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view('question.index');
        $view->questions = \App\Models\Question::orderBy('created_at', 'desc')->get();
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('question.create');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => [
                'required',
                'min:5',
                'regex:/\?$/',
            ],
        ]);

        $question = new \App\Models\Question();
        $question->fill($request->all());
        $question->save();

        return redirect(route('question.show', $question->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = \App\Models\Question::findOrFail($id);

        $view = view('question.show');
        $view->question = $question;
        return $view;
    }
}
