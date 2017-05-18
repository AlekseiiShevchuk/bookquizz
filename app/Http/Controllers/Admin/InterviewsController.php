<?php

namespace App\Http\Controllers\Admin;

use App\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInterviewsRequest;
use App\Http\Requests\Admin\UpdateInterviewsRequest;

class InterviewsController extends Controller
{
    /**
     * Display a listing of Interview.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('interview_access')) {
            return abort(401);
        }

        $interviews = Interview::all();

        return view('admin.interviews.index', compact('interviews'));
    }

    /**
     * Show the form for creating new Interview.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('interview_create')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('book_code', 'id')->prepend('Please select', ''),
        ];

        return view('admin.interviews.create', $relations);
    }

    /**
     * Store a newly created Interview in storage.
     *
     * @param  \App\Http\Requests\StoreInterviewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterviewsRequest $request)
    {
        if (! Gate::allows('interview_create')) {
            return abort(401);
        }
        $interview = Interview::create($request->all());

        foreach ($request->input('interview_answers', []) as $data) {
            $interview->interviewAnswer()->create($data);
        }


        return redirect()->route('admin.interviews.index');
    }


    /**
     * Show the form for editing Interview.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('interview_edit')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('book_code', 'id')->prepend('Please select', ''),
        ];

        $interview = Interview::findOrFail($id);

        return view('admin.interviews.edit', compact('interview') + $relations);
    }

    /**
     * Update Interview in storage.
     *
     * @param  \App\Http\Requests\UpdateInterviewsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterviewsRequest $request, $id)
    {
        if (! Gate::allows('interview_edit')) {
            return abort(401);
        }
        $interview = Interview::findOrFail($id);
        $interview->update($request->all());

        $interviewAnswers           = $interview->interviewAnswer;
        $currentInterviewAnswerData = [];
        foreach ($request->input('interview_answers', []) as $index => $data) {
            if (is_integer($index)) {
                $interview->interviewAnswer()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentInterviewAnswerData[$id] = $data;
            }
        }
        foreach ($interviewAnswers as $item) {
            if (isset($currentInterviewAnswerData[$item->id])) {
                $item->update($currentInterviewAnswerData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.interviews.index');
    }


    /**
     * Display Interview.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('interview_view')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('book_code', 'id')->prepend('Please select', ''),
            'interview_answers' => \App\InterviewAnswer::where('interview_id', $id)->get(),
            'user_interview_answers' => \App\UserInterviewAnswer::where('interview_id', $id)->get(),
        ];

        $interview = Interview::findOrFail($id);

        return view('admin.interviews.show', compact('interview') + $relations);
    }


    /**
     * Remove Interview from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('interview_delete')) {
            return abort(401);
        }
        $interview = Interview::findOrFail($id);
        $interview->delete();

        return redirect()->route('admin.interviews.index');
    }

    /**
     * Delete all selected Interview at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('interview_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Interview::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
