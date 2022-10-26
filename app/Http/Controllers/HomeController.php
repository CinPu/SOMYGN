<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student=Student::with('major')->get();
        $paid=0;
        $due=0;
        foreach ($student as $st){
            $paid+=$st->paid;
            $due+=($st->fee-$st->paid);
        }

        return view('home',compact('student','paid','due'));
    }
    public function qr_scanner(){
        return view('qrcode');
    }
}
