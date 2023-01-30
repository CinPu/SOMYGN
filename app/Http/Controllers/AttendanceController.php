<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendentRecord;
use App\Models\Major;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=AttendentRecord::with('student')->get();
        return view('attendance.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major=Major::all();
        return view('attendance.create',compact('major'));
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
           'start_time'=>'required',
           'major_id'=>'required',
            'date'=>'required'
        ]);
       try {
           $attendance = new Attendance();
           $attendance->date = $request->date;
           $attendance->class_start_time = $request->start_time;
           $attendance->user_id = Auth::user()->id;
           $attendance->class_id = $request->major_id;
           $attendance->save();
           $student = Student::orWhere('major_id',$request->major_id)->orWhere('minor1_id',$request->major_id)->orWhere('minor2_id',$request->major_id)->get();
           foreach ($student as $st) {
               $record = new AttendentRecord();
               $record->attendance_id = $attendance->id;
               $record->student_id = $st->id;
               $record->save();
           }
           return redirect(route('attendance.index'))->with('message','Crated attendance successful');
       }catch (Exception $e){
           echo $e->getMessage();
       }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance=Attendance::with('major')->where('id',$id)->first();
        $records=AttendentRecord::with('student')->where('attendance_id',$id)->get();
        return view('attendance.show',compact('attendance','records'));
    }
// public function record($id)
//    {
//        $attendance=Attendance::with('major')->where('id',$id)->first();
//        $records=AttendentRecord::with('student')->where('attendance_id',$id)->get();
//        return view('qrcode',compact('attendance','records'));
//    }
    public function recorded(Request $request)
    {
//        dd($request->all());
        $student=Student::where('student_id',$request->student_id)->first();
        $exists=AttendentRecord::whereDate('date',Carbon::today())->where('student_id',$student->id)->first();
       if($exists!=null){
          $exists->checkout=Carbon::now();
          $exists->update();
       }else{
           $records=new AttendentRecord();
           $records->student_id=$student->id;
           $records->checkin=Carbon::now();
           $records->date=Carbon::today();
           $records->user_id=Auth::user()->id;
           $records->save();
       }
        return response()->json(['msg','Successful']);
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
        $attendence=Attendance::where('id',$id)->first();
        $attendence->delete();
        return redirect()->back();
    }
}
