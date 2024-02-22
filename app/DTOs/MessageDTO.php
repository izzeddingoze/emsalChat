<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class MessageDTO
{

    public string $content;
    public int $senderUserId;
    public string $to = 'public';
    public ?int $receiverUserId = null;


    public static function buildFromRequest(Request $request): self
    {
        $messageDTO = new self();
        $messageDTO->content = $request->messageContent;
        $messageDTO->to = $request->to;
        $messageDTO->senderUserId = $request->user()->id;
        $messageDTO->receiverUserId = $request->receiverUserId;
        return $messageDTO;
    }
}
