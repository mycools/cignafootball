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
    public $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$name,$username)
    {
        $this->url = $url;
        $this->name = $name;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $this->_data['url'] = $this->url;
        $this->_data['name'] = $this->name;
        $this->_data['username'] = $this->username;
        return $this->subject('Cigna-Football : Forgotten Password')
            ->view('emails.ForgotPassword')->with($this->_data);
    }
}
