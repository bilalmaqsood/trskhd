<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    protected $table = "test_details";

    public $timestamps = true;

//    protected $fillable = ['checked_by','test_id', 'student_id', 'status', 'marks'];
    protected $guarded = [];


    public function test()
    {
        return $this->belongsTo(\App\Trskd\Models\Test::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
