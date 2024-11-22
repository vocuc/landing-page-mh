<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailMaketing extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $price;
    public $name;
    public $paymentCode;
    public $subjectTitle;

    public function __construct($name, $price, $paymentCode, $subjectTitle = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->paymentCode = $paymentCode;
        $this->subjectTitle = "Hoàn thành thanh toán đơn hàng";
    }

    public function build()
    {
        // Nội dung email trực tiếp, không sử dụng template
        $content = "Xin chào {$this->name},\n\n";
        $content .= "Bạn có một đơn hàng chưa hoàn thành. ";
        $content .= "Xin vui lòng hoàn thành đơn hàng của bạn.";

        return $this->subject($this->subjectTitle)
            ->from(config('mail.from.address'))
            ->html($content);
    }
}
