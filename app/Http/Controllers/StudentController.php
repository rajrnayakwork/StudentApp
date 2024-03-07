<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\City;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            $students = Student::with(['city','subjects'])->get();
            return view('students.index')->with(['students' => $students]);
        }
        return redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.'])->onlyInput('email');
    }

    public function create(){
        $subjects = Subject::all();
        $citys = City::all();
        return view('students.create')->with(['subjects' => $subjects,'citys' => $citys]);
    }

    public function store(Request $request){
        $request->validate([
            'user_name' => 'bail|required|unique:users|string|max:250',
            'password' => 'bail|required|min:6',
            'first_name' => 'bail|required|string|max:250',
            'last_name' => 'bail|required|string|max:250',
            'age' => 'bail|required',
            'gender' => 'bail|required',
            'subject' => 'bail|required',
            'city' => 'bail|required',
        ]);
        $password = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $student = new Student;
        $student->fill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'city_id' => $request->city,
        ])->save();
        $student->subjects()->attach($request->subject);

        $user = new User;
        $user->fill([
            'role_type' =>  $request->role_type,
            'user_name' => $request->user_name,
            'password'  => $password,
            'student_id'=> $student->id,
        ])->save();

        return redirect()->route('students.index');
    }

        public function edit($student){
            $student = Student::with('subjects')->find($student);
            $citys = City::all();
            $subjects = Subject::all();
            return view('students.edit')->with(['student' => $student,'citys' => $citys,'subjects' => $subjects]);
        }

        public function update(Request $request){
            $request->validate([
                'username' => 'bail|required|string|max:250',
                'first_name' => 'bail|required|string|max:250',
                'last_name' => 'bail|required|string|max:250',
                'age' => 'bail|required',
                'gender' => 'bail|required',
                'subject' => 'bail|required',
                'city' => 'bail|required',
            ]);
            $student = Student::find($request->id);
            if ($request->username != $student->username) {
                $request->validate([
                    'username' => 'bail|required|unique:students|string|max:250',
                ]);
            }
            $student->username = $request->username;
            $student->firstname = $request->first_name;
            $student->lastname = $request->last_name;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->city_id = $request->city;
            $student->save();
            $student->subjects()->sync($request->subject);
            return redirect()->route('students.index');
        }

    public function destroy($student){
        $user = User::where('student_id',$student);
        $user->delete();
        $student = Student::find($student);
        $student->subjects()->detach();
        $student->delete();
        return redirect()->route('students.index');
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
        if(!$subjects){
            $error += ['subject' => "Fill the subject please.."];
        }
        if(!$city){
            $error += ['city' => "Fill the City please.."];
        }
        return $error;
    }
}
