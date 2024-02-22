<?php

namespace App\Services\Interfaces;

use App\DTOs\LoginUserDTO;
use App\DTOs\ResultDTO;
use App\Models\User;

interface LoginServiceInterface
{
    public function loginUser(LoginUserDTO $loginUserDTO): ResultDTO;

    public function logout(User $user): ResultDTO;
}
