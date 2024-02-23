<?php

namespace App\Services;

use App\DTOs\LoginUserDTO;
use App\DTOs\MessageDTO;
use App\DTOs\ResultDTO;
use App\Enums\MessagesTo;
use App\Events\NewMessage;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use App\Services\Interfaces\LoginServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use Illuminate\Support\Facades\Auth;

class MessageService implements MessageServiceInterface
{

    public function newMessage(MessageDTO $messageDTO): ResultDTO
    {
        $message = Message::create([
            'content' => $messageDTO->content,
            'sender_user_id' => $messageDTO->senderUserId,
            'to' => $messageDTO->to,
            'receiver_user_id' => $messageDTO->receiverUserId
        ]);
        event(new NewMessage($message));
        return ResultDTO::success('Mesaj oluşturuldu!', new MessageResource($message));
    }

    public function getPublicMessages(): ResultDTO
    {
        $messages = MessageResource::collection(Message::where('to', MessagesTo::Public)->get());
        return ResultDTO::success('Mesajlar getirildi!', $messages);
    }
}
