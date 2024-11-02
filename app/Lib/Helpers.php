<?php
if (!function_exists('phone_validate')) {
    function phone_validate($phone)
    {
        $prefixHeaderNumbers = '086|096|097|';
        $prefixHeaderNumbers .= '098|032|033|';
        $prefixHeaderNumbers .= '034|035|036|';
        $prefixHeaderNumbers .= '037|038|039|';
        $prefixHeaderNumbers .= '089|090|093|';
        $prefixHeaderNumbers .= '070|079|077|';
        $prefixHeaderNumbers .= '076|078|091|';
        $prefixHeaderNumbers .= '094|088|083|';
        $prefixHeaderNumbers .= '084|085|081|082|092|052|058|056|087';

        $phone = preg_replace('/^\+84/', '0', $phone);

        if (!preg_match('/^0/', $phone)) {
            return [
                'status' => false,
                'messages' => "Số điện thoại không đúng định dạng"
            ];
        }

        if (!preg_match('/^[0-9]+$/', $phone)) {
            return [
                'status' => false,
                'messages' => "Số điện thoại phải là số"
            ];
        }

        $phoneLength = strlen($phone);
        if ($phoneLength < 10 || $phoneLength > 10) {
            return [
                'status' => false,
                'messages' => "Số điện thoại phải là 10 chữ số"
            ];
        }

        if (!preg_match('/^' . $prefixHeaderNumbers . '/', $phone)) {
            return [
                'status' => false,
                'messages' => "Đầu số điện thoại của bạn không được hỗ trợ"
            ];
        }

        return [
            'status' => true,
            'messages' => ""
        ];
    }
}
