<?php

namespace App\Services\OTP\Creator;

use App\Services\OTP\Products\OTPSender;

/**
 * Interface LoggerFactory
 */
interface SendOTPCreator
{
    /**
     * @param $serverRegister
     * @param $type
     * @return OTPSender
     */
    public static function createOTPSender($serverRegister,$type): OTPSender;


}
