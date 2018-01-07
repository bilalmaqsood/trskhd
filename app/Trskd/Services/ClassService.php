<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Book;
use App\Trskd\Models\Exam;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class ClassService
{
    protected $model, $booksModel;

    public function __construct(SchoolClass $schoolClass, Book $book)
    {
        $this->model      = $schoolClass;
        $this->booksModel = $book;
    }

    public function initialize()
    {
        $classes   = SchoolClass::with('students')->get();
        $teachers  = Teacher::with('user')->get();
        $exams     = Exam::with('teacher')->get();
        return [$classes , $teachers, $exams];
    }

    public function create()
    {
        $data = request()->all();

        $cls = $this->model->create($data);

        $books = request()->books;

        foreach ($books as $book){

            $cls->books()->create(['name' => $book, 'user_id' => Auth::user()->id]);
        }

        return $cls;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function update($id)
    {
        $cls = $this->find($id);
        $data = request()->all();
        $books = request()->books;
        $cls->update($data);

//        $cls->books()->delete();

        foreach ($books as $b){

            if(!$b['id']){

                $cls->books()->create(['name' => $b['name'], 'user_id' => Auth::user()->id]);

            }else{

                $book = Book::find($b['id']);
                $book->name    = $b['name'];
                $book->user_id = Auth::user()->id;
                $book->save();
            }


            /*$cls->books()->updateOrCreate(
                ['class_id' => $cls->id,'id' => $book[1], 'name' => $book[0], 'user_id' => Auth::user()->id],
                ['name' => $book[0], 'user_id' => Auth::user()->id]
            );*/
        }

    }

}