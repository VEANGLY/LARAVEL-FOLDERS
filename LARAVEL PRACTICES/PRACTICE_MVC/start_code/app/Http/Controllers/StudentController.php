<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // API ROUTE
    public function getStudent(){
        $allStudnet = Student::all();
        return $allStudnet;
    }
    public function getStudentbyId($id){
        $allStudents = Student::all();
        foreach($allStudents as $student){
            if($student->id == $id){
                return $student;
            }
        }
    }
    // WEB ROUTE
    public function showStudent(){
        $allStudents = Student::all();
        return view('students',['allStudents' => $allStudents]);
    }
}
