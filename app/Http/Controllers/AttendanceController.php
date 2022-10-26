<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Major;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date=$request->date??Carbon::today();
        $attendance=Attendance::with('student','major')->whereDate('date',$date)->get();
        return view('attendance.index',compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major=Major::all();
        return view('attendance.crate',compact('major'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'start_date'=>'required',
           'end_date'=>'required',
           'major_id'=>'required',
        ]);
        $student=Student::all();
        $start=Carbon::parse($request->start_date);
        $end=Carbon::parse($request->end_date);
        $days = $start->diffInDays($end);
        for($i=0;$i<$days;$i++){
            foreach ($student as $st){
                $attendance=new Attendance();
                $attendance->student_id=$st->id;
                $attendance->class_id=$st->major_id;
                $attendance->date=$start->addDay($i);
                $attendance->user_id=Auth::user()->id;
                $attendance->save();

                $attendance=new Attendance();
                $attendance->student_id=$st->id;
                $attendance->class_id=$st->minor1_id;
                $attendance->date=$start->addDay($i);
                $attendance->user_id=Auth::user()->id;
                $attendance->save();
                if($st->minor2_id!=null){
                    $attendance=new Attendance();
                    $attendance->student_id=$st->id;
                    $attendance->major_id=$st->minor2_id;
                    $attendance->date=$start->addDay($i);
                    $attendance->user_id=Auth::user()->id;
                    $attendance->save();
                }

            }
        }
        return redirect(route('attendance.index'))->with('message','Crated attendance for'.$days.'successful');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attendance=Attendance::where('student_id',$request->student_id)->whereDate('date',Carbon::today())->first();
        $attendance->attend=1;
        $attendance->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
