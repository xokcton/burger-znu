<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $street;
    protected $totalSum;
    protected $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $street, $totalSum, $id)
    {
        $this->name = $name;
        $this->street = $street;
        $this->totalSum = $totalSum;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order')
                    ->with([
                        'name' => $this->name,
                        'street' => $this->street,
                        'totalSum' => $this->totalSum,
                        'id' => $this->id,
                    ])
                    ->subject('New order!');
    }
}
