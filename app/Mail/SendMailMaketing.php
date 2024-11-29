<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailMaketing extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $productId;
    public $name;
    public $paymentCode;
    public $subjectTitle;

    public function __construct($name, $productId, $paymentCode, $subjectTitle = null)
    {
        $this->name = $name;
        $this->productId = $productId;
        $this->subjectTitle = "Hoàn thành thanh toán đơn hàng";
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hoàn thành đơn hàng'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.send-mail-payment',
        );
    }
}
