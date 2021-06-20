<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Quartdetravail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SenderNotification extends Notification
{
    use Queueable;

    protected $quart;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Quartdetravil $quart)
    {
        $this->quart = $quart;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'titre' => $this->quart->titre,
            'etat' =>$this->quart->quart_etat,
            'jour_debut' => $this->jour_debut,
            'pro_id' => (integer)$this->pro_id
        ];
    }
}
