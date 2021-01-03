<?php

namespace App\Events;

use App\VoteTransaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * Data
     *
     * @var \App\VoteTransaction
     */
    public $vt;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(VoteTransaction $vt)
    {
        $this->username = $vt->username;
        $this->vote = $vt->vote;
        $this->masukan = $vt->masukan;
        $this->tgl_aksi = $vt->tgl_aksi;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat');
    }
}
