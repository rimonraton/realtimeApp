<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use App\Model\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReplyResource;
use App\Notifications\NewReply;
use App\Events\ReplyDeleteEvent;

class ReplyController extends Controller
{
    public function __construct()
    {
         $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
       // return Reply::latest()->get();
    }

    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());
        $user = $question->user;
        if($reply->user_id != $question->user_id){
            $user->notify(new NewReply($reply));
        }

        return response(['reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        broadcast(new ReplyDeleteEvent($reply->id))->toOthers();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
