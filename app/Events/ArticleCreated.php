<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // 이벤트 채널은 DTO(Data Transfer Object)다. 다른 클래스가 DTO의 프로퍼티에 접근할 수 있게 public으로 선언했다.
    public $article;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\Article $article)
    {
        //
        $this->article = $article;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
