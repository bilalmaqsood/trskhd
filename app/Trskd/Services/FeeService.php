<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\User;

class UserService
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create()
    {
        $user_data = request()->all();

        $user      = $this->model->create($user_data);

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
}