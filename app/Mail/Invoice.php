<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable {
    use Queueable, SerializesModels;

    private $transaction;
    private $orders;
    public function __construct($transaction, $orders) {
        $this->transaction = $transaction;
        $this->orders = $orders;
    }

    public function build() {
        return $this->view('emails.invoice')
            ->with([
                'transaction' => $this->transaction,
                'orders' => $this->orders,
        ]);
    }
}
