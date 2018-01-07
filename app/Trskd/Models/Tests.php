<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $table = "tests";

    public $timestamps = true;

    protected $fillable = [ 'user_id','class_id', 'teacher_id' ,'Type' , 'Name', 'book_id' ,'Year','Total_Marks'

        ,'Passing_Marks','Start_Date','Start_Time', 'End_Time'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function examclass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id' ,'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class , 'book_id' , 'id');
    }

    public function details()
    {
        return $this->hasMany(TestDetail::class,'test_id');
    }
}
