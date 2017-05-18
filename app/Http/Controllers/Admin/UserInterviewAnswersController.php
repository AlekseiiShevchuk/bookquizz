<?php

namespace App\Http\Controllers\Admin;

use App\UserInterviewAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserInterviewAnswersRequest;
use App\Http\Requests\Admin\UpdateUserInterviewAnswersRequest;

class UserInterviewAnswersController extends Controller
{
    /**
     * Display a listing of UserInterviewAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_interview_answer_access')) {
            return abort(401);
        }

        $user_interview_answers = UserInterviewAnswer::all();

        return view('admin.user_interview_answers.index', compact('user_interview_answers'));
    }

    /**
     * Show the form for creating new UserInterviewAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_interview_answer_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'interview_answers' => \App\InterviewAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('admin.user_interview_answers.create', $relations);
    }

    /**
     * Store a newly created UserInterviewAnswer in storage.
     *
     * @param  \App\Http\Requests\StoreUserInterviewAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserInterviewAnswersRequest $request)
    {
        if (! Gate::allows('user_interview_answer_create')) {
            return abort(401);
        }
        $user_interview_answer = UserInterviewAnswer::create($request->all());



        return redirect()->route('admin.user_interview_answers.index');
    }


    /**
     * Show the form for editing UserInterviewAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_interview_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'interview_answers' => \App\InterviewAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user_interview_answer = UserInterviewAnswer::findOrFail($id);

        return view('admin.user_interview_answers.edit', compact('user_interview_answer') + $relations);
    }

    /**
     * Update UserInterviewAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdateUserInterviewAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserInterviewAnswersRequest $request, $id)
    {
        if (! Gate::allows('user_interview_answer_edit')) {
            return abort(401);
        }
        $user_interview_answer = UserInterviewAnswer::findOrFail($id);
        $user_interview_answer->update($request->all());



        return redirect()->route('admin.user_interview_answers.index');
    }


    /**
     * Display UserInterviewAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_interview_answer_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('device_id', 'id')->prepend('Please select', ''),
            'interview_answers' => \App\InterviewAnswer::get()->pluck('text', 'id')->prepend('Please select', ''),
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $user_interview_answer = UserInterviewAnswer::findOrFail($id);

        return view('admin.user_interview_answers.show', compact('user_interview_answer') + $relations);
    }


    /**
     * Remove UserInterviewAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_interview_answer_delete')) {
            return abort(401);
        }
        $user_interview_answer = UserInterviewAnswer::findOrFail($id);
        $user_interview_answer->delete();

        return redirect()->route('admin.user_interview_answers.index');
    }

    /**
     * Delete all selected UserInterviewAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_interview_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = UserInterviewAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
