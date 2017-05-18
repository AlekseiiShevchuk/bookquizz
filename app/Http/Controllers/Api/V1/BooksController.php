<?php

namespace App\Http\Controllers\Api\V1;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBooksRequest;
use App\Http\Requests\Admin\UpdateBooksRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BooksController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Book::all();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function update(Admin\UpdateBooksRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        
        $interviews           = $book->interview;
        $currentInterviewData = [];
        foreach ($request->input('interviews', []) as $index => $data) {
            if (is_integer($index)) {
                $book->interview()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentInterviewData[$id] = $data;
            }
        }
        foreach ($interviews as $item) {
            if (isset($currentInterviewData[$item->id])) {
                $item->update($currentInterviewData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $tests           = $book->test;
        $currentTestData = [];
        foreach ($request->input('tests', []) as $index => $data) {
            if (is_integer($index)) {
                $book->test()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentTestData[$id] = $data;
            }
        }
        foreach ($tests as $item) {
            if (isset($currentTestData[$item->id])) {
                $item->update($currentTestData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $book;
    }

    public function store(Admin\StoreBooksRequest $request)
    {
        $request = $this->saveFiles($request);
        $book = Book::create($request->all());
        
        foreach ($request->input('interviews', []) as $data) {
            $book->interview()->create($data);
        }
        foreach ($request->input('tests', []) as $data) {
            $book->test()->create($data);
        }

        return $book;
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return '';
    }
}
