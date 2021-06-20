<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuartEtat extends Notification
{
    use Queueable;


    protected $quart;
    protected $poste;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($poste,$quart)
    {
        $this->quart = $quart;
        $this->poste = $poste;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$url = url('/invoice/'.$this->invoice->id);
        return (new MailMessage)
                    ->subject(__('CODE 101 - Notification quart de travail'))
                    ->line(__("Nous accusons réception du fait que le quart de travail "). $this->quart->titre.(" soit ") . $this->quart->quart_etat)
                    ->line('Dès la confirmation de la résidence, nous inclurons dans vos prochains honoraires.')
                    ->line(__("Poste à combler : "). $this->poste->post_name)
                    ->line(__("Date : "). $this->quart->jour_debut.(" Heure :"). $this->quart->heure_debut)
                    ->action('Voir le quart de travail ', url('/quart/show/'.$this->quart->id))
                    ->line('Merci de nous faire confiance,');
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
