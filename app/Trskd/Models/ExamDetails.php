<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class ExamDetails extends Model
{
    protected $table = "exam_details";

    public $timestamps = true;

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

}
