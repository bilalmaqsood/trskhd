<?php

namespace App\Trskd\Models;

use App\Trskd\Models\SchoolClass;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    public $timestamps = true;

    protected $fillable = ['class_id' , 'user_id', 'name'];

    public function classes()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function tests()
    {
        return $this->hasMany(Tests::class);
    }
    public function exams()
    {
        return $this->hasMany(ExamDetails::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class, 'book_id' , 'id');
    }

    public function number($exam, $classId, $studentId)
    {

        $examId = $exam->first()->id;

        $result = Result::where('book_id', $this->id)
            ->where('class_id', $classId)->where('exam_id', $examId)->where('student_id', $studentId)->first();

//        return $result;
        return isset($result) ? $result->obtained_marks : 0;
    }
}
