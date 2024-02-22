<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $senderUser = $this->senderUser;
        $receiverUser = $this->receiverUser;
        return [
            'id' => $this->id,
            'content' => $this->content,
            'senderUser' => $senderUser ? new UserResource($senderUser) : null,
            'receiverUser' => $receiverUser ? new UserResource($receiverUser) : null,
            'to' => $this->to,
            'createdAt' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
