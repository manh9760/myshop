<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordAdmin extends Mailable {
    use Queueable, SerializesModels;
    
    private $userId;

    public function __construct($userId){
        $this->userId = $userId;
    }

    public function build() {
        return $this->view('emails.resetPasswordAdmin')->with([
            'userId' => $this->userId,
        ]);
    }
}
