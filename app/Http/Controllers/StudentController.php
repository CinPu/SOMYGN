<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Models\StudentIdPrefix;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Student::with('major','minor1','minor2')->get();
        return view('students.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major=Major::all();
        $prefixs = StudentIdPrefix::first();
        $student = Student::orderBy('id', 'desc')->first();
        if ($student != null) {
            // Sum 1 + last id

                $student->student_id++;
                $student_id = $student->student_id;

        } else {
            $student_id = $prefixs->prefix . "-0001";
        }
        return view('students.create',compact('major','student_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'student_id'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'fee'=>'required',
            'major_id'=>'required',
            'minor1_id'=>'required',
            'paid'=>'required',


        ]);
        $data=$request->all();
        $data['barcode']=random_int(1000000000000,9999999999999);
        Student::create($data);
        return redirect(route('students.index'))->with('message','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::with('major')->where('id',$id)->firstOrFail();
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::with('major')->where("id",$id)->firstOrFail();
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'student_id'=>'required',
            'phone',
            'email',
            'fee',
            'major_id',
            'paid',
            'address',

        ]);
        $student=Student::where('id',$id)->firstOrFail();
        $student->update($request->all());
        return redirect(route('student.index'))->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::where('id',$id)->firstOrFail();
        $student->delete();
        return redirect(route('student.index'))->with('message','Success');
    }
}
