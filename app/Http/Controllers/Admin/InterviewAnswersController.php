<?php

namespace App\Http\Controllers\Admin;

use App\InterviewAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInterviewAnswersRequest;
use App\Http\Requests\Admin\UpdateInterviewAnswersRequest;

class InterviewAnswersController extends Controller
{
    /**
     * Display a listing of InterviewAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('interview_answer_access')) {
            return abort(401);
        }

        $interview_answers = InterviewAnswer::all();

        return view('admin.interview_answers.index', compact('interview_answers'));
    }

    /**
     * Show the form for creating new InterviewAnswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('interview_answer_create')) {
            return abort(401);
        }
        $relations = [
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('admin.interview_answers.create', $relations);
    }

    /**
     * Store a newly created InterviewAnswer in storage.
     *
     * @param  \App\Http\Requests\StoreInterviewAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewAnswersRequest $request)
    {
        if (! Gate::allows('interview_answer_create')) {
            return abort(401);
        }
        $interview_answer = InterviewAnswer::create($request->all());



        return redirect()->route('admin.interview_answers.index');
    }


    /**
     * Show the form for editing InterviewAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('interview_answer_edit')) {
            return abort(401);
        }
        $relations = [
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $interview_answer = InterviewAnswer::findOrFail($id);

        return view('admin.interview_answers.edit', compact('interview_answer') + $relations);
    }

    /**
     * Update InterviewAnswer in storage.
     *
     * @param  \App\Http\Requests\UpdateInterviewAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterviewAnswersRequest $request, $id)
    {
        if (! Gate::allows('interview_answer_edit')) {
            return abort(401);
        }
        $interview_answer = InterviewAnswer::findOrFail($id);
        $interview_answer->update($request->all());



        return redirect()->route('admin.interview_answers.index');
    }


    /**
     * Display InterviewAnswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('interview_answer_view')) {
            return abort(401);
        }
        $relations = [
            'interviews' => \App\Interview::get()->pluck('title', 'id')->prepend('Please select', ''),
            'user_interview_answers' => \App\UserInterviewAnswer::where('interview_answer_id', $id)->get(),
        ];

        $interview_answer = InterviewAnswer::findOrFail($id);

        return view('admin.interview_answers.show', compact('interview_answer') + $relations);
    }


    /**
     * Remove InterviewAnswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('interview_answer_delete')) {
            return abort(401);
        }
        $interview_answer = InterviewAnswer::findOrFail($id);
        $interview_answer->delete();

        return redirect()->route('admin.interview_answers.index');
    }

    /**
     * Delete all selected InterviewAnswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('interview_answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = InterviewAnswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
