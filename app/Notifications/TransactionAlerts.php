<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TransactionAlerts extends Notification
{
    use Queueable;

    protected $transactionDetail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transactionDetail)
    {
        //
        $this->transactionDetail    =   $transactionDetail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        //dd($this->transactionDetail);
        return [
            //
            "transactionDetail"=>$this->transactionDetail,
            "sender"=>auth()->user(),
            "user"=>$notifiable
        ];
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
