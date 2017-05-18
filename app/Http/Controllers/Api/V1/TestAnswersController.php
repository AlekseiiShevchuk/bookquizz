<?php

namespace App\Http\Controllers\Api\V1;

use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestAnswersRequest;
use App\Http\Requests\Admin\UpdateTestAnswersRequest;

class TestAnswersController extends Controller
{
    public function index()
    {
        return TestAnswer::all();
    }

    public function show($id)
    {
        return TestAnswer::findOrFail($id);
    }

    public function update(Admin\UpdateTestAnswersRequest $request, $id)
    {
        $test_answer = TestAnswer::findOrFail($id);
        $test_answer->update($request->all());
        

        return $test_answer;
    }

    public function store(Admin\StoreTestAnswersRequest $request)
    {
        $test_answer = TestAnswer::create($request->all());
        

        return $test_answer;
    }

    public function destroy($id)
    {
        $test_answer = TestAnswer::findOrFail($id);
        $test_answer->delete();
        return '';
    }
}
