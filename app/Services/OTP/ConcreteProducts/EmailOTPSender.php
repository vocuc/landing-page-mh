<?php

namespace App\Services\OTP\ConcreteProducts;

use App\Mail\SendOTP;
use App\Services\OTP\Products\OTPSender;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

/**
 * Class EmailOTPSender
 * @package App\Services\OTP
 */
class EmailOTPSender extends OTPSender
{
    /**
     * @var string
     */
    public $subjectTitle = "";

    /**
     * EmailOTPSender constructor.
     * @param $serviceRegister
     */
    public function __construct($serviceRegister)
    {
        parent::__construct($serviceRegister);
    }

    /**
     * @return array|mixed
     *
     * Thực hiện việc gửi email
     */
    public function sent(): array
    {
        $serverOTP = Redis::get($this->redisCreateKey($this->to . '4'));
        
        if (!empty($serverOTP)) {
            return [
                "status" => false,
                "message" => "OTP đã được gửi đến email của bạn",
                "ttl" => Redis::ttl($this->redisCreateKey($this->to))
            ];
        }

        Mail::raw('OTP' . $this->createOTP(), function ($message) {
            $message->to($this->to);
        });

        // Mail::to($this->to)->send(new SendOTP(
        //     $this->createOTP(),
        //     $this->toName,
        //     $this->template,
        //     $this->subjectTitle
        // ));

        return [
            "status" => true,
            "message" => "Gửi OTP thành công"
        ];
    }

    /**
     * @param string $subjectTitle
     */
    public function subjectTitle(string $subjectTitle)
    {
        $this->subjectTitle = $subjectTitle;
    }
}
