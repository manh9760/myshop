<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredUser extends Mailable {
    use Queueable, SerializesModels;

    private $full_name;
    private $userId;

    public function __construct($userId, $full_name){
        $this->userId = $userId;
        $this->full_name = $full_name;
    }

    public function build() {
        return $this->view('emails.registered')->with([
            'userId' => $this->userId,
            'full_name' => $this->full_name,
        ]);
    }
}
