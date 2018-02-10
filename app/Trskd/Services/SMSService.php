<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/26/2017
 * Time: 12:39 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Smsable;


class SMSService
{

    public function passwordResetSMS($number, $password , $name)
    {
        $number  = $number;
        $message = "Dear ". $name . " your new password is: ". $password;

        return sendSms($number , $message);
    }

    public function birthDaySMS($user)
    {
        $message = "Happy birth day Deer ".$user->First_Name." ".$user->Last_Name;
        $number  = $user->Mobile;

        $status  = sendSingleSms($number,$message);
        /*if($status){
            Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);
        }*/

        return true;
    }

    public function absentSMS($user , $type)
    {
        $message = "Dear {$type} ".$user->First_Name." ".$user->Last_Name. " you are absent today";
        $number  = $user->Mobile;
        sendSingleSms($number,$message);
        /*if($status){
            Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);
        }*/
    }
    public function feeSMS($user , $type)
    {
        $message = "Dear {$type} ".$user->First_Name." ".$user->Last_Name. " do not reveice your fees.";
        $number  = $user->Mobile;
        sendSingleSms($number,$message);
        /*if($status){
            Smsable::create(['user_id' => $user->id, 'text' => $message, 'receiver'=> $number]);
        }*/
    }
    
    
}
