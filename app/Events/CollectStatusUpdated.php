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

class CollectStatusUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $collect;

    public function __construct(Collect $collect )
    {
      $this->collect = $collect;
      $message = "CLIENT " . $collect->product->client_id . " has accepted to update collect " .  $collect->id .  " status to " . $collect->status_id;
      Storage::disk('archivos')->append('updates.txt', $message);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
