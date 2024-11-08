<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTP extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $otp;
    public $name;
    public $subjectTitle;

    public function __construct($otp, $name, $subjectTitle = null)
    {
        $this->otp = $otp;
        $this->name = $name;
        $this->subjectTitle = $subjectTitle ?: "Mã OTP của bạn là: " . $otp;
    }

    public function build()
    {
        // Nội dung email trực tiếp, không sử dụng template
        $content = "Xin chào {$this->name},\n\n";
        $content .= "Mã OTP của bạn là: {$this->otp}\n\n";
        $content .= "Xin vui lòng không chia sẻ mã này với bất kỳ ai.";

        return $this->subject($this->subjectTitle)
            ->from(env('MAIL_FROM_ADDRESS', 'no-reply@limcorp.vn')) // Thay đổi thành email của bạn
            ->html($content); // Sử dụng nội dung HTML hoặc text tùy chỉnh    
    }
}
