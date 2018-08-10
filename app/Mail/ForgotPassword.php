<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $url;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$name)
    {
        $this->url = $url;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $this->_data['url'] = $this->url;
        $this->_data['name'] = $this->name;
        return $this->subject('Cigna-Football : Forgotten Password')
            ->view('emails.ForgotPassword')->with($this->_data);
    }
}
