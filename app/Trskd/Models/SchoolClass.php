<?php

namespace App\Trskd\Models;

use App\Trskd\Models\Book;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = "classes";
    public $timestamps = true;
    protected $fillable = ['name' , 'seats' , 'fee'];

    /*public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }*/

    public function students()
    {
        return $this->belongsToMany(Student::class,'class_student','class_id','student_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class , 'class_id' , 'id');
    }

    public function tests()
    {
        return $this->hasMany(Tests::class ,'class_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class,'class_id' , 'id');
    }
}
