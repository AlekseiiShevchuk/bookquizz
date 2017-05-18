<?php

namespace App\Http\Controllers\Api\V1;

use App\UserTestAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserTestAnswersRequest;
use App\Http\Requests\Admin\UpdateUserTestAnswersRequest;

class UserTestAnswersController extends Controller
{
    public function index()
    {
        return UserTestAnswer::all();
    }

    public function show($id)
    {
        return UserTestAnswer::findOrFail($id);
    }

    public function update(Admin\UpdateUserTestAnswersRequest $request, $id)
    {
        $user_test_answer = UserTestAnswer::findOrFail($id);
        $user_test_answer->update($request->all());
        

        return $user_test_answer;
    }

    public function store(Admin\StoreUserTestAnswersRequest $request)
    {
        $user_test_answer = UserTestAnswer::create($request->all());
        

        return $user_test_answer;
    }

    public function destroy($id)
    {
        $user_test_answer = UserTestAnswer::findOrFail($id);
        $user_test_answer->delete();
        return '';
    }
}
