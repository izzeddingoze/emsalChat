<?php

namespace App\DTOs;

use App\Enums\Result;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ResultDTO
{
    public ?string $result;
    public ?string $message;
    public ?int $statusCode;
    public mixed $data;

    public static function fail(string $message = null, mixed $data = null, int $statusCode = ResponseAlias::HTTP_BAD_REQUEST): self
    {
        $resultDTO = new self();
        $resultDTO->result = Result::Error;
        $resultDTO->statusCode = $statusCode;
        $resultDTO->message = $message;
        $resultDTO->data = $data;

        return $resultDTO;
    }

    public static function success(string $message = null, mixed $data = null, int $statusCode = ResponseAlias::HTTP_OK): self
    {
        $resultDTO = new self();
        $resultDTO->result = Result::Success;
        $resultDTO->statusCode = $statusCode;
        $resultDTO->message = $message;
        $resultDTO->data = $data;

        return $resultDTO;
    }

}


