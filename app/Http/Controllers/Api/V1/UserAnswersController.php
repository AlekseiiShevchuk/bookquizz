<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\PossibleAnswer;
use App\UserAnswer;
use Illuminate\Support\Facades\Auth;

class UserAnswersController extends Controller
{
    public function postAnswer(PossibleAnswer $possibleAnswer)
    {
        UserAnswer::create([
            'user_id' => Auth::id(),
            'possible_answer_id' => $possibleAnswer->id,
            'quiz_id' => $possibleAnswer->quiz->id
        ]);

        return response()->json('Success');
    }
}
