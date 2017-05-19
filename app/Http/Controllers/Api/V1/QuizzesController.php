<?php

namespace App\Http\Controllers\Api\V1;

use App\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuizzesRequest;
use App\Http\Requests\Admin\UpdateQuizzesRequest;

class QuizzesController extends Controller
{
    public function index()
    {
        return Quiz::all();
    }

    public function show($id)
    {
        return Quiz::findOrFail($id);
    }

    public function update(Admin\UpdateQuizzesRequest $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());
        
        $possibleAnswers           = $quiz->possibleAnswer;
        $currentPossibleAnswerData = [];
        foreach ($request->input('possible_answers', []) as $index => $data) {
            if (is_integer($index)) {
                $quiz->possibleAnswer()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentPossibleAnswerData[$id] = $data;
            }
        }
        foreach ($possibleAnswers as $item) {
            if (isset($currentPossibleAnswerData[$item->id])) {
                $item->update($currentPossibleAnswerData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $quiz;
    }

    public function store(Admin\StoreQuizzesRequest $request)
    {
        $quiz = Quiz::create($request->all());
        
        foreach ($request->input('possible_answers', []) as $data) {
            $quiz->possibleAnswer()->create($data);
        }

        return $quiz;
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        return '';
    }
}
