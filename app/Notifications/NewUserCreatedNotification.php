<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;

class NewUserCreatedNotification extends Notification implements ShouldQueue
{
    protected $user;
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nueva Solicitud de Usuario')
                    ->line($this->user->name . ' ' . $this->user->apellido . ' ha solicitado acceso al sistema.')
                    ->action('Ver Solicitudes Pendientes', url( config("app.url") . '/solicitudes') )
                    ->line('Muchas gracias!');
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
            'link' => url( config("app.url") . '/solicitudes'),
            'text' => $this->user->name . ' ' . $this->user->apellido . ' solicita acceso al sistema.'
        ];
    }
}
