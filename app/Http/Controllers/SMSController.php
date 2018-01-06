<?php

namespace App\Http\Controllers;

use App\Trskd\Services\SMSService;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    protected $service;
    public function __construct(SMSService $SMSService)
    {
        $this->service = $SMSService;
    }

    public function singleStudentSMS()
    {
        return view('sms.single');
    }

    public function sendSingleSMS(Request $request)
    {
        $number = $request->number;
        sendSms($number);
        return redirect()->back();
    }
}
