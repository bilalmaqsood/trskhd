<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "results";

    public $timestamps = true;

    protected $fillable = ['class_id', 'student_id', 'book_id', 'obtained_marks', 'exam_id', 'status', 'remarks'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
