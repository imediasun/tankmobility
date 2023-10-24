<?php

namespace App\Containers\AppSection\Product\Notifications;

use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class InCaseFullyApprovementNotification extends ParentNotification
{
    use Queueable;

    protected Product $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //TODO: mailable
        return (new MailMessage)
            ->subject('Votre commande a été aprouvée')
            ->markdown('ship::in-case-fully-approvement-notification');
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
            'product' => $this->product
        ];
    }
}
