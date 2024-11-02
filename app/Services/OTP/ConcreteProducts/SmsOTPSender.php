<?php

namespace App\Services\OTP\ConcreteProducts;

use App\Models\LogResponseSms;
use App\Services\OTP\Products\OTPSender;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

/**
 * Class SmsOTPSender
 * @package App\Services\OTP
 */
class SmsOTPSender extends OTPSender
{
    /**
     * SmsOTPSender constructor.
     * @param $serviceRegister
     */
    public function __construct($serviceRegister)
    {
        parent::__construct($serviceRegister);
    }

    /**
     * @return array|mixed
     *
     * Thực hiện việc gửi otp đến số điện thoại người nhận
     */
    public function sent()
    {
        $serverOTP = Redis::get($this->redisCreateKey($this->to));

        if (!empty($serverOTP)) {
            return [
                "status" => false,
                "message" => "OTP đã được gửi đến số điện thoại của bạn",
                "ttl" => Redis::ttl($this->redisCreateKey($this->to))
            ];
        }

        $client = new Client();

        $response = $client->post("https://api.brandsms.vn/api/SMSBrandname/SendSMS", [
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'token' => env('SMS_API_TOKEN', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c24iOiJnbXYiLCJzaWQiOiJiZDllMTA2My1iNDVhLTQ5YzAtYmY2ZC1kOGMyNzUxYzUyMDAiLCJvYnQiOiIiLCJvYmoiOiIiLCJuYmYiOjE3MjEyODQ5OTYsImV4cCI6MTcyMTI4ODU5NiwiaWF0IjoxNzIxMjg0OTk2fQ.gsoQUMR627fKv6KZ3-6hn-nc8IopnxZamukwZ9UC0X0')
            ],
            'json' => [
                'to' => $this->to,
                'type' => 1,
                'from' => 'GMV.VN',
                'message' => 'GMV.VN thong bao ma xac thuc OTP cua ban la ' . $this->createOTP(),
                'scheduled' => ''
            ],
        ]);

        LogResponseSms::create( [
            'phone' => $this->to,
            'data' => $response->getBody()->getContents(),
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData = json_decode($response->getBody()->getContents(), true);
            return [
                "status" => true,
                "data" => $responseData,
                "message" => "Gửi OTP thành công"
            ];
        } else {
              return [
                "status" => false,
                "code" => $response->getStatusCode(),
                "message" => "Gửi OTP thất bại"
            ];
        }

    }
}
