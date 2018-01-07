<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 1/2/2018
 * Time: 8:15 AM
 */

namespace App\Trskd\Observers;


use App\Trskd\Models\User;
use App\Trskd\Services\SMSService;
use Illuminate\Support\Facades\Hash;

class UserObserver extends AbstractObserver
{
    public function saved($model)
    {
//        $this->clearCacheSections($model->getTable());
    }


    public function created($user)
    {
        if($user->id){
            $newPassword = str_random(6);
            $mobile      = $user->Mobile;
            $name        = $user->First_Name.' '.$user->Last_Name;
            $response    = passwordResetSMS($mobile, $newPassword,$name);
            if($response){
                $hashed_random_password = Hash::make($newPassword);
                $user->password = $hashed_random_password;
                $user->save();
            }
        }
    }

    public function deleted($model)
    {
//        $this->clearCacheSections($model->getTable());
    }


}