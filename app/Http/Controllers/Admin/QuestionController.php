<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Http\Requests\StoreContact;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(5);
        return view('admin.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $questions = new Question();
        $this->saveFormValues($request, $questions);
        return redirect('/admin/question')->with('success', 'Question by "' . $questions->name . '" has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::findOrFail($id);
        return view('admin.question.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::findOrFail($id);
        return view('admin.question.edit', compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContact $request, $id)
    {
        $questions = Question::findOrFail($id);
        $this->saveFormValues($request, $questions);
        return redirect('/admin/question')->with('success', 'Question by "' . $questions->name . '" has been successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Question::findOrFail($id);
        $name = $questions->name;
        $questions->delete();
        return redirect('/admin/question')->with('success', 'Question by "' . $name . '" has been successfully deleted!');
    }

    public function saveFormValues(StoreContact $request, Question $questions)
    {
        $questions->name = $request->name;
        $questions->email = $request->email;
        $questions->problem = $request->problem;

        $questions->save();
    }
}
