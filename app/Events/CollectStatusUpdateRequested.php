<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Collect;
use Storage;

class CollectStatusUpdateRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $collect;
    public $requestTypeId;

    public function __construct(Collect $collect, $requestTypeId)
    {
      $this->collect = $collect;
      $this->requestTypeId = $requestTypeId;

      $message = "CADETE " . $collect->workload->cadete_id . " wants to change collect " . $collect->id . " status to: " . $requestTypeId;

      Storage::disk('archivos')->append('requests.txt', $message);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
