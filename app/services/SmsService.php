<?php

namespace App\Services;
use App\Models\Setting;

class SmsService
{

    public function send($phone, $message)
    {
        $url = "add your sms api url here";

        $data = [
            'token'   => '', // <-sms server access token add here
            'to'      => $phone,//phone no get into user database
            'message' => $message,//this messege get into setting database
        ];

        // ---- cURL START ----
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err      = curl_error($ch);

        curl_close($ch);
        // ---- cURL END ----
        
        //error validation
        if ($err) {
            return ['status' => false, 'error' => $err];
        }

        return ['status' => true, 'response' => $response];
    }
}
