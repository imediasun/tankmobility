<?php

namespace App\Containers\AppSection\Product\Notifications;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuccessfullOrderNotification extends ParentNotification implements ShouldQueue
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
            ->subject('Votre commande à bien été enregistrée')
            ->markdown('ship::successfull-order-notification');
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
