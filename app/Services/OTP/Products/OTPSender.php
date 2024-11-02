<?php

namespace App\Services\OTP\Products;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

/**
 * Class OTPSender
 */
abstract class OTPSender
{
    /**
     * @var string
     */
    public $serviceRegister = "";

    /**
     * @var string
     *
     * Địa chỉ email hoặc số điện thoại người nhận OTP
     */
    protected $to;

    /**
     * @var string
     *
     * Tên người nhận có thể bỏ trống
     */
    protected $toName;

    /**
     * @var int
     *
     * Thời gian sống của OTP
     */
    protected $timeToLive = 300;

    /**
     * @var string
     *
     * Template gửi OTP
     */
    protected $template = "";

    /**
     * OTPSender constructor.
     * @param $serviceRegister
     */
    public function __construct($serviceRegister)
    {
        $this->serviceRegister = Str::slug($serviceRegister, "_");
    }

    /**
     * @param $address
     * @param $name
     */
    public function to($address, $name = null)
    {
        $this->to = $address;
        $this->toName = $name;
    }

    /**
     * @param $template
     */
    public function template($template)
    {
        $this->template = $template;
    }

    /**
     * Tạo mã OTP
     *
     * @return int
     */
    public function createOTP(): int
    {
        $otp = rand(1111, 9999);

        Redis::set($this->redisCreateKey($this->to), $otp, 'EX', $this->timeToLive);

        return $otp;
    }

    /**
     * Xác minh OTP
     *
     * @param string $otp
     * @return array
     */
    public function verify(string $otp): array
    {
        $serverOTP = Redis::get($this->redisCreateKey($this->to));

        if (empty($serverOTP) || $otp != $serverOTP) {
            return [
                "status" => false,
                "message" => "OTP không đúng"
            ];
        }

        Redis::del($this->redisCreateKey($this->to));

        return [
            "status" => true,
            "message" => "Xác nhận OTP thành công"
        ];
    }

    /**
     * Tạo key cho Redis
     *
     * @param string $address
     * @return string
     */
    protected function redisCreateKey(string $address): string
    {
        return 'otp_' . $this->serviceRegister . "_" . $address;
    }

    /**
     * @return mixed
     *
     * Thực hiện việc gửi OTP
     */
    abstract public function sent();
}
