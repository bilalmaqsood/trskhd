<?php

namespace App\Trskd\Models;

use App\Trskd\Observers\UserObserver;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'First_Name', 'Last_Name' ,  'email', 'username', 'DOB','CNIC',
        'Guardian' , 'Mobile' , 'Martial_Status', 'Gender' , 'Religion'
        ,'Nationality' ,'Address','Country', 'Image'

    ];

    public $timestamps = true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function table()
    {
        $model = new static;
        return $model->getTable();
    }
    public static function boot() {
        parent::boot();

        User::observe(new UserObserver());
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function authorizeRoles($roles)
    {

        if(is_array($roles)){
            return $this->hasAnyRole() || abort(401 , 'This action is unauthorized');
        }
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name' , $roles)->first();
    }
}
