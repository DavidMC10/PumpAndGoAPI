<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FuelPumpEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $currentPumpAmount;

    public $channelId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($channelId, $currentPumpAmount)
    {
        $this->currentPumpAmount = $currentPumpAmount;
        $this->channelId = $channelId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['channelId.'.$this->channelId];
    }

    public function broadcastAs()
    {
        return 'pumping';
    }
}
