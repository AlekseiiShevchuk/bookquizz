<?php

namespace App\Http\Controllers\Api\V1;

use App\PossibleAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePossibleAnswersRequest;
use App\Http\Requests\Admin\UpdatePossibleAnswersRequest;

class PossibleAnswersController extends Controller
{
    public function index()
    {
        return PossibleAnswer::all();
    }

    public function show($id)
    {
        return PossibleAnswer::findOrFail($id);
    }

    public function update(Admin\UpdatePossibleAnswersRequest $request, $id)
    {
        $possible_answer = PossibleAnswer::findOrFail($id);
        $possible_answer->update($request->all());
        

        return $possible_answer;
    }

    public function store(Admin\StorePossibleAnswersRequest $request)
    {
        $possible_answer = PossibleAnswer::create($request->all());
        

        return $possible_answer;
    }

    public function destroy($id)
    {
        $possible_answer = PossibleAnswer::findOrFail($id);
        $possible_answer->delete();
        return '';
    }
}
