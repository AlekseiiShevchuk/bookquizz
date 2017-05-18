<?php

namespace App\Http\Controllers\Admin;

use App\UserTestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserTestAnswersRequest;
use App\Http\Requests\Admin\UpdateUserTestAnswersRequest;

class UserTestAnswersController extends Controller
{
    /**
     * Display a listing of UserTestAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_test_answer_access')) {
            return abort(401);
        }

        $user_test_answers = UserTestAnswer::all();

        return view('admin.user_test_answers.index', compact('user_test_answers'));
    }

    /**
     * Show the form for creating new UserTestAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_test_answer_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'test_answers' => \App\TestAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('admin.user_test_answers.create', $relations);
    }

    /**
     * Store a newly created UserTestAnswer in storage.
     *
     * @param  \App\Http\Requests\StoreUserTestAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTestAnswersRequest $request)
    {
        if (! Gate::allows('user_test_answer_create')) {
            return abort(401);
        }
        $user_test_answer = UserTestAnswer::create($request->all());



        return redirect()->route('admin.user_test_answers.index');
    }


    /**
     * Show the form for editing UserTestAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_test_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'test_answers' => \App\TestAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user_test_answer = UserTestAnswer::findOrFail($id);

        return view('admin.user_test_answers.edit', compact('user_test_answer') + $relations);
    }

    /**
     * Update UserTestAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTestAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTestAnswersRequest $request, $id)
    {
        if (! Gate::allows('user_test_answer_edit')) {
            return abort(401);
        }
        $user_test_answer = UserTestAnswer::findOrFail($id);
        $user_test_answer->update($request->all());



        return redirect()->route('admin.user_test_answers.index');
    }


    /**
     * Display UserTestAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_test_answer_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'test_answers' => \App\TestAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user_test_answer = UserTestAnswer::findOrFail($id);

        return view('admin.user_test_answers.show', compact('user_test_answer') + $relations);
    }


    /**
     * Remove UserTestAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_test_answer_delete')) {
            return abort(401);
        }
        $user_test_answer = UserTestAnswer::findOrFail($id);
        $user_test_answer->delete();

        return redirect()->route('admin.user_test_answers.index');
    }

    /**
     * Delete all selected UserTestAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_test_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = UserTestAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
