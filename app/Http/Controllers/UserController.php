<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('major')->get();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major=Major::all();
        return view('user.create',compact('major'));
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'pass'=>'required',

        ]);
        $data=$request->all();
        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $name=$file->getClientOriginalName();
            $file->move(public_path() . '/assets/profile/',$name);
            $data['profile'] = $name;
        }
        $data['password']=Hash::make($request->pass);
        User::create($data);
        return redirect(route('user.index'))->with('message','Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with('major')->where('id',$id)->firstOrFail();
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::with('major')->where('id',$id)->firstOrFail();
        $major=Major::all();
        return view('user.edit',compact('user','major'));
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
            'email'=>'required',
            'phone'=>'required',


        ]);
        $user=User::with('major')->where('id',$id)->firstOrFail();
        $data=$request->all();
        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $name=$file->getClientOriginalName();
            $file->move(public_path() . '/assets/profile/',$name);
            $data['profile'] = $name;
        }
        $user->update($data);
        return redirect(route('user.index'))->with('message','Successful');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::where('id',$id)->firstOrFail();
        $user->delete();
        return redirect(route('user.index'))->with('message','Successful');
    }
}
