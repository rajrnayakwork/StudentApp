<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\City;
use App\Models\Student;
use App\Models\StudentSubject;
class StudentController extends Controller
{
    public function index(){
        $students = Student::with(['city','subjects'])->get();
        $subjects = Subject::all();
        return view('students.index')->with(['students' => $students,'subjects' => $subjects]);
    }

    public function create(){
        $subjects = Subject::all();
        $citys = City::all();
        return view('students.create')->with(['subjects' => $subjects,'citys' => $citys]);
    }

    public function store(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $student = new Student;
            $student->firstname = $request->first_name;
            $student->lastname = $request->last_name;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->city_id = $request->city;
            $student->save();
            foreach ($request->subject as $value) {
                $subject = new StudentSubject;
                $subject->student_id = $student->id;
                $subject->subject_id = $value;
                $subject->save();
            }
            return redirect()->route('students.index');
        }
    }

    public function edit($student){
        $student = Student::find($student);
        $citys = City::all();
        return view('students.edit')->with(['student' => $student,'citys' => $citys]);
    }

    public function update(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $student = Student::find($request->id);
            $student->firstname = $request->first_name;
            $student->lastname = $request->last_name;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->city_id = $request->city;
            $student->save();
            return redirect()->route('students.index');
        }
    }

    public function validation($request){
        $error = [];
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $age = $request->age;
        $gender = $request->gender;
        $city = $request->city;
        $subjects = $request->subject;

        if($first_name){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
                $error += ['first_name' => "Only letters and white space allowed.."];
                }
        }else{
            $error += ['first_name' => "Fill the First Name please.."];
        }
        if($last_name){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
                $error += ['last_name' => "Only letters and white space allowed.."];
                }
        }else{
            $error += ['last_name' => "Fill the Last Name please.."];
        }
        if(!$age){
            $error += ['age' => "Fill the Age please.."];
        }
        if(!$gender){
            $error += ['gender' => "Fill the Gender please.."];
        }
        // if(!$subjects){
        //     $error += ['subject' => "Fill the subject please.."];
        // }
        if(!$city){
            $error += ['city' => "Fill the City please.."];
        }
        return $error;
    }
}
