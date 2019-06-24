<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{

    public function index(Question $question)
    {
        return $question->replies;
        return Reply::latest()->get();
    }


    public function create()
    {
        //
    }

    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());
        return response(['reply' => $reply], Response::HTTP_CREATED);
    }


    public function show(Question $question, Reply $reply)
    {
        return $reply;
    }

    public function edit(Reply $reply)
    {
        //
    }

    public function update(Request $request, Reply $reply)
    {
        //
    }

    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
