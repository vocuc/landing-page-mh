<?php

namespace App\Services\OTP\ConcreteCreators;

use App\Services\OTP\ConcreteProducts\EmailOTPSender;
use App\Services\OTP\ConcreteProducts\EmailPaymentProductOTPSender;
use App\Services\OTP\ConcreteProducts\SmsOTPSender;
use App\Services\OTP\Creator\SendOTPCreator;
use App\Services\OTP\Products\OTPSender;

class SendOTPConcreteCreator implements SendOTPCreator
{
    /**
     * @param $serviceRegister
     * @param $type
     * @return OTPSender
     *
     * Khởi tạo đối tượng gửi mail hoặc sms
     */
    public static function createOTPSender($serviceRegister, $type = 'email'): OTPSender
    {
        if ($type == 'email') {
            return new EmailOTPSender($serviceRegister);
        }

        if ($type == 'email_product_otp') {
            return new EmailPaymentProductOTPSender($serviceRegister);
        }
        
        if ($type == 'sms') {
            return new SmsOTPSender($serviceRegister);
        }
    }
}
