<?php

namespace App\Http\Controllers\Api\V1;

use App\UserInterviewAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserInterviewAnswersRequest;
use App\Http\Requests\Admin\UpdateUserInterviewAnswersRequest;

class UserInterviewAnswersController extends Controller
{
    public function index()
    {
        return UserInterviewAnswer::all();
    }

    public function show($id)
    {
        return UserInterviewAnswer::findOrFail($id);
    }

    public function update(Admin\UpdateUserInterviewAnswersRequest $request, $id)
    {
        $user_interview_answer = UserInterviewAnswer::findOrFail($id);
        $user_interview_answer->update($request->all());
        

        return $user_interview_answer;
    }

    public function store(Admin\StoreUserInterviewAnswersRequest $request)
    {
        $user_interview_answer = UserInterviewAnswer::create($request->all());
        

        return $user_interview_answer;
    }

    public function destroy($id)
    {
        $user_interview_answer = UserInterviewAnswer::findOrFail($id);
        $user_interview_answer->delete();
        return '';
    }
}
