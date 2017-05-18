<?php

namespace App\Http\Controllers\Admin;

use App\TestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestAnswersRequest;
use App\Http\Requests\Admin\UpdateTestAnswersRequest;

class TestAnswersController extends Controller
{
    /**
     * Display a listing of TestAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('test_answer_access')) {
            return abort(401);
        }

        $test_answers = TestAnswer::all();

        return view('admin.test_answers.index', compact('test_answers'));
    }

    /**
     * Show the form for creating new TestAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('test_answer_create')) {
            return abort(401);
        }
        $relations = [
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('admin.test_answers.create', $relations);
    }

    /**
     * Store a newly created TestAnswer in storage.
     *
     * @param  \App\Http\Requests\StoreTestAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestAnswersRequest $request)
    {
        if (! Gate::allows('test_answer_create')) {
            return abort(401);
        }
        $test_answer = TestAnswer::create($request->all());



        return redirect()->route('admin.test_answers.index');
    }


    /**
     * Show the form for editing TestAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('test_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $test_answer = TestAnswer::findOrFail($id);

        return view('admin.test_answers.edit', compact('test_answer') + $relations);
    }

    /**
     * Update TestAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdateTestAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestAnswersRequest $request, $id)
    {
        if (! Gate::allows('test_answer_edit')) {
            return abort(401);
        }
        $test_answer = TestAnswer::findOrFail($id);
        $test_answer->update($request->all());



        return redirect()->route('admin.test_answers.index');
    }


    /**
     * Display TestAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('test_answer_view')) {
            return abort(401);
        }
        $relations = [
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
            'user_test_answers' => \App\UserTestAnswer::where('test_answer_id', $id)->get(),
        ];

        $test_answer = TestAnswer::findOrFail($id);

        return view('admin.test_answers.show', compact('test_answer') + $relations);
    }


    /**
     * Remove TestAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('test_answer_delete')) {
            return abort(401);
        }
        $test_answer = TestAnswer::findOrFail($id);
        $test_answer->delete();

        return redirect()->route('admin.test_answers.index');
    }

    /**
     * Delete all selected TestAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('test_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TestAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
