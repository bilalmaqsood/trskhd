<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $model, $sms;

    public function __construct(User $user, SMSService $SMSService)
    {
        $this->model = $user;
        $this->sms   = $SMSService;
    }

    public function create()
    {
        $data = request()->all();

        $data['password'] =  Hash::make('123456');
        if(request()->hasFile('Image')){

            $data['Image'] = $this->uploadImage();
        }

        $user = $this->model->create($data);

        return $user;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function status($id)
    {

        $user = $this->find($id);

        if($user->Activated){

            $user->Activated = 0;
            $user->save();
        }else{
            $user->Activated = 1;
            $user->save();
        }
    }

    public function updateUser($id)
    {
        $user = $this->find($id);
        $data = request()->all();
        if(request()->hasFile('Image')){
            $data['Image'] = $this->uploadImage();
        }

        $user->update($data);
        return $user;
    }
    public function uploadImage()
    {
        $name = "";
        $name = time() . '.' . request()->file('Image')->getClientOriginalExtension();
        request()->file('Image')->move(public_path() . '/users/profile/', $name);
        $name = "users/profile/" . $name;
        return $name;
    }

    public function findByUserName($username)
    {
        return User::where('username' , $username)->first();
    }

    public function newPassword()
    {

    }

    public function resetPassword()
    {
        $username = request()->username;
        $user   = $this->findByUserName($username);

        if(!$user){

            return redirect()->back();
        }

        $name   = $user->First_Name.' '.$user->Last_Name;
        $newPassword = str_random(6);

        $response = $this->sms->passwordResetSMS($user->Mobile, $newPassword,$name);

        if($response){

            $hashed_random_password = Hash::make($newPassword);
            $user->password = $hashed_random_password;
            $user->save();
            return redirect()->route('login');
        }

       return redirect()-> route('password.request');
    }

    public  function createPassword()
    {

    }
}