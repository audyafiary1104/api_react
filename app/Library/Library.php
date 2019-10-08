<?php


namespace App\Library;

class Library
{
    public function Email_validate($email){
        $url = 'https://www.validator.pizza/email/'.$email;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        return $output;
    }
}
