<?php

namespace App\Http\Controllers\Api\V1;

use App\InterviewAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInterviewAnswersRequest;
use App\Http\Requests\Admin\UpdateInterviewAnswersRequest;

class InterviewAnswersController extends Controller
{
    public function index()
    {
        return InterviewAnswer::all();
    }

    public function show($id)
    {
        return InterviewAnswer::findOrFail($id);
    }

    public function update(Admin\UpdateInterviewAnswersRequest $request, $id)
    {
        $interview_answer = InterviewAnswer::findOrFail($id);
        $interview_answer->update($request->all());
        

        return $interview_answer;
    }

    public function store(Admin\StoreInterviewAnswersRequest $request)
    {
        $interview_answer = InterviewAnswer::create($request->all());
        

        return $interview_answer;
    }

    public function destroy($id)
    {
        $interview_answer = InterviewAnswer::findOrFail($id);
        $interview_answer->delete();
        return '';
    }
}
