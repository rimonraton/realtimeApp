<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'reply' =>$this->body,
            'user' =>$this->user->name,
            'user_id' =>$this->user_id,
            'question_slug' =>$this->question->slug,
            'created_at' =>$this->created_at->diffForHumans()
        ];
    }
}
