<?php

namespace App\Http\Controllers\Admin;

use App\PossibleAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePossibleAnswersRequest;
use App\Http\Requests\Admin\UpdatePossibleAnswersRequest;

class PossibleAnswersController extends Controller
{
    /**
     * Display a listing of PossibleAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('possible_answer_access')) {
            return abort(401);
        }

        $possible_answers = PossibleAnswer::all();

        return view('admin.possible_answers.index', compact('possible_answers'));
    }

    /**
     * Show the form for creating new PossibleAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('possible_answer_create')) {
            return abort(401);
        }
        $relations = [
            'quizzes' => \App\Quiz::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        return view('admin.possible_answers.create', $relations);
    }

    /**
     * Store a newly created PossibleAnswer in storage.
     *
     * @param  \App\Http\Requests\StorePossibleAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePossibleAnswersRequest $request)
    {
        if (! Gate::allows('possible_answer_create')) {
            return abort(401);
        }
        $possible_answer = PossibleAnswer::create($request->all());



        return redirect()->route('admin.possible_answers.index');
    }


    /**
     * Show the form for editing PossibleAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('possible_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'quizzes' => \App\Quiz::get()->pluck('question', 'id')->prepend('Please select', ''),
        ];

        $possible_answer = PossibleAnswer::findOrFail($id);

        return view('admin.possible_answers.edit', compact('possible_answer') + $relations);
    }

    /**
     * Update PossibleAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdatePossibleAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePossibleAnswersRequest $request, $id)
    {
        if (! Gate::allows('possible_answer_edit')) {
            return abort(401);
        }
        $possible_answer = PossibleAnswer::findOrFail($id);
        $possible_answer->update($request->all());



        return redirect()->route('admin.possible_answers.index');
    }


    /**
     * Display PossibleAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('possible_answer_view')) {
            return abort(401);
        }
        $relations = [
            'quizzes' => \App\Quiz::get()->pluck('question', 'id')->prepend('Please select', ''),
            'user_answers' => \App\UserAnswer::where('user_answer_id', $id)->get(),
        ];

        $possible_answer = PossibleAnswer::findOrFail($id);

        return view('admin.possible_answers.show', compact('possible_answer') + $relations);
    }


    /**
     * Remove PossibleAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('possible_answer_delete')) {
            return abort(401);
        }
        $possible_answer = PossibleAnswer::findOrFail($id);
        $possible_answer->delete();

        return redirect()->route('admin.possible_answers.index');
    }

    /**
     * Delete all selected PossibleAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('possible_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PossibleAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
