<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $guarded = [
    ];

    public function senderUser():BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_user_id','id');
    }
    public function receiverUser():BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_user_id','id');
    }
}
