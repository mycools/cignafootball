<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\CorpSMS\CorpSMSMessage;
use NotificationChannels\CorpSMS\CorpSMSChannel;

class OneTimePassword extends Notification
{
    use Queueable;
    protected $otp;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if($this->otp['sendsms']==true){
            return [CorpSMSChannel::class];
        }else{
            return [];
        }

    }
    public function toCorpSMS($notifiable)
    {
        $sms = "รหัส OTP คือ ".$this->otp['otp']." (REF : ".$this->otp['refcode'].") ใช้งานได้ที่ http://matchoftheweek.com/";
        return CorpSMSMessage::create($sms);

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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
