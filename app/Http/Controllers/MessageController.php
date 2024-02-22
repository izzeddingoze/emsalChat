<?php

namespace App\Http\Controllers;

use App\DTOs\LoginUserDTO;
use App\DTOs\MessageDTO;
use App\Http\Requests\GetPublicMessagesRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\LogoutUserRequest;
use App\Http\Requests\NewMessageRequest;
use App\Services\Interfaces\LoginServiceInterface;
use App\Services\Interfaces\MessageServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MessageController extends BaseApiController
{

    public function __construct(protected MessageServiceInterface $messageService)
    {

    }

    public function newMessage(NewMessageRequest $request): JsonResponse
    {
        $newMessageResult = $this->messageService->newMessage(MessageDTO::buildFromRequest($request));
        return $this->apiResponse($newMessageResult);
    }

    public function getPublicMessages(GetPublicMessagesRequest $request): JsonResponse
    {
        $getMessagesResult = $this->messageService->getPublicMessages();
        return $this->apiResponse($getMessagesResult);
    }


}
