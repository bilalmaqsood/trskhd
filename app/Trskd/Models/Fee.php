<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table   = "fees";
    public $timestamps = true;

    const PAID = "paid";
    const PENDING = "pending";

    protected $fillable = ['class_id' ,'student_id' , 'status','year','month'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id' , 'id');
    }
}
