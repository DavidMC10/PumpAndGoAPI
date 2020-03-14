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

    public $fuelStationName;
    public $pumpNumber;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($fuelStationName, $pumpNumber)
    {
        $this->fuelStationName = $fuelStationName;
        $this->pumpNumber = $pumpNumber;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel($this->fuelStationName);
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
