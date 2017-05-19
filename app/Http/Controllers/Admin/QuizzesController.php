<?php

namespace App\Http\Controllers\Admin;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuizzesRequest;
use App\Http\Requests\Admin\UpdateQuizzesRequest;

class QuizzesController extends Controller
{
    /**
     * Display a listing of Quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('quiz_access')) {
            return abort(401);
        }

        $quizzes = Quiz::all();

        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating new Quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('quiz_create')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $enum_type = Quiz::$enum_type;
            
        return view('admin.quizzes.create', compact('enum_type') + $relations);
    }

    /**
     * Store a newly created Quiz in storage.
     *
     * @param  \App\Http\Requests\StoreQuizzesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizzesRequest $request)
    {
        if (! Gate::allows('quiz_create')) {
            return abort(401);
        }
        $quiz = Quiz::create($request->all());

        foreach ($request->input('possible_answers', []) as $data) {
            $quiz->possibleAnswer()->create($data);
        }


        return redirect()->route('admin.quizzes.index');
    }


    /**
     * Show the form for editing Quiz.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('quiz_edit')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $enum_type = Quiz::$enum_type;
            
        $quiz = Quiz::findOrFail($id);

        return view('admin.quizzes.edit', compact('quiz', 'enum_type') + $relations);
    }

    /**
     * Update Quiz in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizzesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizzesRequest $request, $id)
    {
        if (! Gate::allows('quiz_edit')) {
            return abort(401);
        }
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


        return redirect()->route('admin.quizzes.index');
    }


    /**
     * Display Quiz.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('quiz_view')) {
            return abort(401);
        }
        $relations = [
            'books' => \App\Book::get()->pluck('title', 'id')->prepend('Please select', ''),
            'possible_answers' => \App\PossibleAnswer::where('quiz_id', $id)->get(),
            'user_answers' => \App\UserAnswer::where('quiz_id', $id)->get(),
        ];

        $quiz = Quiz::findOrFail($id);

        return view('admin.quizzes.show', compact('quiz') + $relations);
    }


    /**
     * Remove Quiz from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('quiz_delete')) {
            return abort(401);
        }
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.quizzes.index');
    }

    /**
     * Delete all selected Quiz at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('quiz_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Quiz::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
