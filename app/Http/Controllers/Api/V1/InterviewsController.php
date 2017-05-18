<?php

namespace App\Http\Controllers\Api\V1;

use App\Interview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreInterviewsRequest;
use App\Http\Requests\Admin\UpdateInterviewsRequest;

class InterviewsController extends Controller
{
    public function index()
    {
        return Interview::all();
    }

    public function show($id)
    {
        return Interview::findOrFail($id);
    }

    public function update(Admin\UpdateInterviewsRequest $request, $id)
    {
        $interview = Interview::findOrFail($id);
        $interview->update($request->all());
        

        return $interview;
    }

    public function store(Admin\StoreInterviewsRequest $request)
    {
        $interview = Interview::create($request->all());
        

        return $interview;
    }

    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);
        $interview->delete();
        return '';
    }
}
