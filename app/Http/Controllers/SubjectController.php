<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subjects.index')->with(['subjects' => $subjects]);
    }

    public function create(){
        return view('subjects.create');
    }

    public function store(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $subject = new Subject;
            $subject->name = $request->subject_name;
            $subject->save();
            return redirect()->route('subjects.index');
        }
    }

    public function edit($subject){
        $subject = Subject::find($subject);
        return view('subjects.edit')->with(['subject' => $subject]);
    }

    public function update(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $subject = Subject::find($request->id);
            $subject->name = $request->subject_name;
            $subject->save();
            return redirect()->route('subjects.index');
        }
    }

    public function destroy($subject){
        $subject = Subject::find($subject);
        $subject->delete();
        return redirect()->route('subjects.index');
    }

    public function validation($request){
        $error = [];
        $subject_name = $request->subject_name;

        if($subject_name){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$subject_name)) {
                $error += ['subject_name' => "Only letters and white space allowed.."];
                }
        }else{
            $error += ['subject_name' => "Fill the subject Name please.."];
        }
        return $error;
    }

}
