<?php

namespace App\Services\OTP\ConcreteProducts;

use App\Mail\SendOTP;
use App\Services\OTP\Products\OTPSender;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

/**
 * Class EmailOTPSender
 * @package App\Services\OTP
 */
class SmsPaymentProductOTPSender extends OTPSender
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
        $key = $this->to . '_' . $this->toName;

        $serverOTP = Redis::get($this->redisCreateKey($this->to . '_' . $this->toName));

        if (!empty($serverOTP)) {
            return [
                "status" => false,
                "message" => "OTP đã được gửi đến số điện thoại của bạn",
                "ttl" => Redis::ttl($this->redisCreateKey($this->to))
            ];
        }

        $client = new Client();

        try {
            $response = $client->post("https://dev-koc.gmv.vn/api/v1/otp", [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
                ],
                'form_params' => [
                    'phone_number' => $this->to,
                    'service_name' => $this->serviceRegister . '_' . $key,
                ],
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
       
        dd($response);
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

    /**
     * @param string $subjectTitle
     */
    public function subjectTitle(string $subjectTitle)
    {
        $this->subjectTitle = $subjectTitle;
    }
}
