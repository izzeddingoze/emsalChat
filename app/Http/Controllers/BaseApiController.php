<?php

namespace App\Http\Controllers;

use App\DTOs\LoginUserDTO;
use App\DTOs\ResultDTO;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\LogoutUserRequest;
use App\Services\Interfaces\LoginServiceInterface;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BaseApiController extends Controller
{

    public function apiResponse(ResultDTO $resultDTO): \Illuminate\Http\JsonResponse
    {
        $response = [
            'result' => $resultDTO->result,
            'message' => $resultDTO->message,
            'data' => $resultDTO->data
        ];

        return response()->json($response, $resultDTO->statusCode);
    }


}
