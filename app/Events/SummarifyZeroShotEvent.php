<?php

namespace App\Events;

use App\Models\Conversion;
use App\Services\Api\SummarifyService;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SummarifyZeroShotEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Conversion $conversion;
    public array $params;

    /**
     * Create a new event instance.
     */
    public function __construct(Conversion $conversion, array $params)
    {
        $this->conversion = $conversion;
        $this->params = $params;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
