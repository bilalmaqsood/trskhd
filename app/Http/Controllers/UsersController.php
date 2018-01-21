<?php

namespace App\Http\Controllers;

use App\Trskd\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function passwordReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:17',
        ]);

        if ($validator->fails()) {
            return redirect()->route('password.mobile')
                ->withErrors($validator)
                ->withInput();
        }
        $this->service->resetPassword();
        return redirect()->route('login');

    }

}
