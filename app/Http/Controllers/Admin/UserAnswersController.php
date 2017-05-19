<?php

namespace App\Http\Controllers\Admin;

use App\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserAnswersRequest;
use App\Http\Requests\Admin\UpdateUserAnswersRequest;

class UserAnswersController extends Controller
{
    /**
     * Display a listing of UserAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_answer_access')) {
            return abort(401);
        }

        $user_answers = UserAnswer::all();

        return view('admin.user_answers.index', compact('user_answers'));
    }

    /**
     * Show the form for creating new UserAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_answer_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'user_answers' => \App\PossibleAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'quizzes' => \App\Quiz::get()->pluck('type', 'id')->prepend('Please select', ''),
        ];

        return view('admin.user_answers.create', $relations);
    }

    /**
     * Store a newly created UserAnswer in storage.
     *
     * @param  \App\Http\Requests\StoreUserAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAnswersRequest $request)
    {
        if (! Gate::allows('user_answer_create')) {
            return abort(401);
        }
        $user_answer = UserAnswer::create($request->all());



        return redirect()->route('admin.user_answers.index');
    }


    /**
     * Show the form for editing UserAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'user_answers' => \App\PossibleAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'quizzes' => \App\Quiz::get()->pluck('type', 'id')->prepend('Please select', ''),
        ];

        $user_answer = UserAnswer::findOrFail($id);

        return view('admin.user_answers.edit', compact('user_answer') + $relations);
    }

    /**
     * Update UserAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAnswersRequest $request, $id)
    {
        if (! Gate::allows('user_answer_edit')) {
            return abort(401);
        }
        $user_answer = UserAnswer::findOrFail($id);
        $user_answer->update($request->all());



        return redirect()->route('admin.user_answers.index');
    }


    /**
     * Display UserAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_answer_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'user_answers' => \App\PossibleAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'quizzes' => \App\Quiz::get()->pluck('type', 'id')->prepend('Please select', ''),
        ];

        $user_answer = UserAnswer::findOrFail($id);

        return view('admin.user_answers.show', compact('user_answer') + $relations);
    }


    /**
     * Remove UserAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_answer_delete')) {
            return abort(401);
        }
        $user_answer = UserAnswer::findOrFail($id);
        $user_answer->delete();

        return redirect()->route('admin.user_answers.index');
    }

    /**
     * Delete all selected UserAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = UserAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
