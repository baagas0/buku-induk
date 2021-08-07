<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function getIndex(){
        $data['data'] = Student::get();
        return view('teacher.student.main', $data);
    }

    public function getView($nis){
        $data['student'] = Student::where('nis', $nis)->first();
        return view('teacher.student.view', $data);
    }
}
