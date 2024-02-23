<?php

namespace App\Events;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TimeReminder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;




    /**
     * Create a new event instance.
     */
    public function __construct()
    {


    }


    public function broadcastOn(): Channel
    {
        return new Channel('emsalChat');
    }

    public function broadcastAs(): string
    {
        return 'timeReminder';
    }

    public function broadcastWith(): array
    {
        return [

        ];
    }
}
