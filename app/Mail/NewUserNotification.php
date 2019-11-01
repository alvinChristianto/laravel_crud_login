<?php

namespace App\Mail;


use App\User;
use App\verifyuser; 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(user $user, verifyuser $verifyuser)
    {
        $this->user = $user;
        $this->verifyuser = $verifyuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        #return $this->from('mail@example.com', 'Mailtrap')
        #->subject('Mailtrap Confirmation')
        #->markdown('mails.exmpl')
        #->with([
        #    'name' => 'New Mailtrap User',
        #    'link' => 'https://mailtrap.io/inboxes'
        #]);
        
        return $this->from('no-reply@createit.com', 'CreateIt')
        ->subject('CreateIt Confirmation')
        ->view('mails.verifyemail')
        //->markdown('vendor.notifications.email')
        ->with([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'tokenemail' => $this->verifyuser->token
            #'name' => 'Alvin Christianto',
            #'link' => 'http://127.0.0.1:8000/login/',
            #'faq' => 'http://127.0.0.1:8000/faq/'
        ]);

    }
}
