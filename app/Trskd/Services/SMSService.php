<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/26/2017
 * Time: 12:39 PM
 */

namespace App\Trskd\Services;


class SMSService
{

    public function passwordResetSMS($number, $password , $name)
    {
        $number  = $number;
        $message = "Dear ". $name . " your new password is: ". $password;

        return sendSms($number , $message);
    }
}