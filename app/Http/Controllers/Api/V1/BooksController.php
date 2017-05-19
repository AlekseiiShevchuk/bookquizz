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
        return Book::all();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function update(UpdateBooksRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $book = Book::findOrFail($id);
        $book->update($request->all());


        return $book;
    }

    public function store(Admin\StoreBooksRequest $request)
    {
        $request = $this->saveFiles($request);
        $book = Book::create($request->all());


        return $book;
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return '';
    }
}
