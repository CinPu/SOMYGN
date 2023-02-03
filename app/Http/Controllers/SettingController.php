<?php

namespace App\Http\Controllers;

use App\Models\StudentIdPrefix;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public  function prefix(){
        $prefix=StudentIdPrefix::all();
        return view('setting.prefix',compact('prefix'));
    }
    public function prefixUpdate(Request $request,$id){
        $prefix=StudentIdPrefix::where('id',$id)->first();
        $prefix->prefix=$request->prefix;
        $prefix->update();
        return redirect(route('students.create'));
    }
}
