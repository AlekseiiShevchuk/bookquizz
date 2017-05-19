<?php

namespace App\Http\Controllers\Api\V1;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\UpdateBooksRequest;

class BooksController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Book::all()->load('quizzes.possibleAnswers');
    }

    public function show($id)
    {
        return Book::whereBookCode($id)->first()->load('quizzes.possibleAnswers');
    }
}
