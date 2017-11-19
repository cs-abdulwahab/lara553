<?php

namespace App\Events;

use App\Http\Resources\SensorDataResource;
use App\SensorData;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SensorEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $sendata;


    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param SensorData $sensorData
     */
    public function __construct(SensorDataResource $sensorDataResource)
    {

        $this->sendata = $sensorDataResource;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
     //   return new PrivateChannel('my-channel');
        return new Channel("my-channel");
    }

    public function broadcastAs()
    {
        return 'sensordata.recieved';
    }

    public function broadcastWith()
    {
        //   TODO:  I actually wanted to send the object
        //   return [  $this->sensordata];
        return [$this->sendata];
    }


}
