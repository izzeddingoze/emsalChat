<?php

namespace App\Http\Controllers;

use App\DTOs\LoginUserDTO;
use App\DTOs\ResultDTO;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\LogoutUserRequest;
use App\Services\Interfaces\LoginServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginController extends BaseApiController
{

    public function __construct(protected LoginServiceInterface $loginService)
    {
    }

    public function loginUser(LoginUserRequest $request): JsonResponse
    {
        $loginResult = $this->loginService->loginUser(LoginUserDTO::buildFromRequest($request));
        return $this->apiResponse($loginResult);
    }

    public function logout(LogoutUserRequest $request): JsonResponse
    {
        $logoutResult = $this->loginService->logout($request->user());
        return $this->apiResponse($logoutResult);
    }


}
