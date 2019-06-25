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
            'created_at' =>$this->created_at->diffForHumans()
        ];
    }
}
