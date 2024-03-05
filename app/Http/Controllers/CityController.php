<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(){
        $citys = City::all();
        return view('citys.index')->with(['citys' => $citys]);
    }

    public function create(){
        return view('citys.create');
    }

    public function store(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $city = new City;
            $city->name = $request->city_name;
            $city->save();
            return redirect()->route('citys.index');
        }
    }

    public function edit($city){
        $city = City::find($city);
        return view('citys.edit')->with(['city' => $city]);
    }

    public function update(Request $request){
        $error = $this->validation($request);
        if ($error != null) {
            return redirect()->back()->withErrors($error)->withInput();
        } else {
            $city = City::find($request->id);
            $city->name = $request->city_name;
            $city->save();
            return redirect()->route('citys.index');
        }
    }

    public function destroy($city){
        $city = City::find($city);
        $city->delete();
        return redirect()->route('citys.index');
    }

    public function validation($request){
        $error = [];
        $city_name = $request->city_name;

        if($city_name){
            if (!preg_match("/^[a-zA-Z-' ]*$/",$city_name)) {
                $error += ['city_name' => "Only letters and white space allowed.."];
                }
        }else{
            $error += ['city_name' => "Fill the city Name please.."];
        }
        return $error;
    }
}
