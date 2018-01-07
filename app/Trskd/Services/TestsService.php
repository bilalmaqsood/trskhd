<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 12/24/2017
 * Time: 1:05 PM
 */

namespace App\Trskd\Services;


use App\Trskd\Models\Book;
use App\Trskd\Models\Tests;
use App\Trskd\Models\SchoolClass;
use App\Trskd\Models\Teacher;

class TestsService
{
    protected $model;

    public function __construct(Tests $test)
    {
        $this->model = $test;
    }

    public function initialize()
    {
        $classes   = SchoolClass::all();
        $teachers  = Teacher::with('user')->get();
        $test     = Tests::with('teacher')->get();
        $books     = Book::all();
        return [$classes, $teachers, $test, $books];
    }

    public function create()
    {
        $data = request()->all();

        $test = $this->model->create($data);

        return $test;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function update($id)
    {
        $test = $this->find($id);
        $data = request()->all();
        $test->update($data);

    }
}