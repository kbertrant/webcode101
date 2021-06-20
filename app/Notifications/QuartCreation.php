<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuartCreation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject(__('CODE 101 - Nouveaux quarts de travail disponibles'))
                    ->line(__("De nouveaux quarts de travail correspondants à votre profil sont actuellement disponibles"))
                    ->line(__('Nous vous invitons à consulter le calendrier des quarts de travail pour le poste suivant :'))
                    ->line('Choisissez vite les quarts de travail qui vous conviennent')
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
        $titre = "Nouveaux quarts disponibles";
        $message = "De nouveaux quarts de travail correspondants
        à votre profil sont actuellement disponibles. Nous vous invitons à consulter
        le calendrier des quarts de travail. 
        Choisissez vite les quarts de travail qui vous conviennent.
        Merci de nous faire confiance.";

        return [
            'titre' => $titre,
            'message' => $message
        ];
    }
}
