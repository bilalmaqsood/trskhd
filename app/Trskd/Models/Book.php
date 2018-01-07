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
}
