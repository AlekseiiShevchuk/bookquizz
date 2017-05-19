<?php

namespace App\Http\Controllers\Api\V1;

use App\UserAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserAnswersRequest;
use App\Http\Requests\Admin\UpdateUserAnswersRequest;

class UserAnswersController extends Controller
{
    public function index()
    {
        return UserAnswer::all();
    }

    public function show($id)
    {
        return UserAnswer::findOrFail($id);
    }

    public function update(Admin\UpdateUserAnswersRequest $request, $id)
    {
        $user_answer = UserAnswer::findOrFail($id);
        $user_answer->update($request->all());
        

        return $user_answer;
    }

    public function store(Admin\StoreUserAnswersRequest $request)
    {
        $user_answer = UserAnswer::create($request->all());
        

        return $user_answer;
    }

    public function destroy($id)
    {
        $user_answer = UserAnswer::findOrFail($id);
        $user_answer->delete();
        return '';
    }
}
