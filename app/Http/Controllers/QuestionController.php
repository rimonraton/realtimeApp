<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{

    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

   
    public function store(Request $request)
    {
        //auth()->user()->question->create($request->all());
        Question::create($request->all());
        return response('created', Response::HTTP_CREATED);
    }


    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    public function edit(Question $question)
    {
        //
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }


    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
