<?php

namespace App\Services\Interfaces;

use App\DTOs\LoginUserDTO;
use App\DTOs\MessageDTO;
use App\DTOs\ResultDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface MessageServiceInterface
{
    public function newMessage(MessageDTO $messageDTO): ResultDTO;

    public function getPublicMessages(): ResultDTO;
}
