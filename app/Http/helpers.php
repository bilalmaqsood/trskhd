<?php

use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Student;
use App\Trskd\Models\User;
use TADPHP\TADFactory;
use TADPHP\TAD;

if (!function_exists('parse')) {

    function parse($date) {

        return \Carbon\Carbon::parse($date);

    }
}


if (!function_exists('totalStudents')) {

    function totalStudents($id, $gender)
    {
        $total = SchoolClass::with('students')->where('id' , $id)->get();
        dd($total['students']);
    }
}
if (!function_exists('sendSms')) {

    function sendSms($number , $message = null)
    {
        $username = 'Babartrs';
        $password = '12345678';
        $to = $number;
        $from = 'Brand';
        $url = "http://Lifetimesms.com/plain?username=".$username."&password=".$password."&to=".$to."&from=".urlencode($from)."&message=".urlencode($message)."";
        //Curl Start
        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt ($ch,CURLOPT_URL, $url) ;
        curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, $timeout) ;
        $response = curl_exec($ch) ;

        $info = curl_getinfo($ch);

        curl_close($ch) ;
        //Write out the response


        if ($response === false || $info['http_code'] != 200) {

            $output = "No cURL data returned for $url [". $info['http_code']. "]";
            if (curl_error($ch))
                $output .= "\n". curl_error($ch);
            return false;
        }else{;
            return true;
        }
    }

}
if (!function_exists('sendSingleSms')) {

    function sendSingleSms($number , $message = null)
    {

        $username = 'Babartrs';
        $password = '12345678';
        $to = $number;
        $from = 'Brand';
        $url = "http://Lifetimesms.com/plain?username=".$username."&password=".$password."&to=".$to."&from=".urlencode($from)."&message=".urlencode($message)."";
        //Curl Start
        $ch  =  curl_init();
        $timeout  =  30;
        curl_setopt ($ch,CURLOPT_URL, $url) ;
        curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, $timeout) ;
        $response = curl_exec($ch) ;

        $info = curl_getinfo($ch);

        curl_close($ch) ;
        //Write out the response


        if ($response === false || $info['http_code'] != 200) {

            $output = "No cURL data returned for $url [". $info['http_code']. "]";
            if (curl_error($ch))
                $output .= "\n". curl_error($ch);
            return false;
        }else{;
            return true;
        }

        return false;
    }

}

if (!function_exists('passwordResetSMS')) {

    function passwordResetSMS($number, $password , $name)
    {
        $number  = $number;
        $message = "Dear ". $name . " your new password is: ". $password;
        return sendSms($number , $message);
    }
}

if (!function_exists('months')) {

    function months($number)
    {
        $dateObj   = DateTime::createFromFormat('!m', $number);
        $monthName = $dateObj->format('F'); // March
        return $monthName;
    }
}

if (!function_exists('totalFee')) {

    function totalFee($fees,$amount)
    {
        $count = $fees->count();
        return $count*$amount;
    }
}

if (!function_exists('deviceStatus')) {

    function deviceStatus($ip='182.180.104.108')
    {
      $tadf = new TADFactory(['ip' => $ip]);
        $tad = $tadf->get_instance();

        $status = $tad->is_alive();
        logger($status);
        return $status;
    
    }
}
