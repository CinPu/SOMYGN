@extends('layouts.app')
@section('title','User Profile')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Profile</h5>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-md-4 col-4">
                       <div class="row">
                           <div class="col-12">
                               <img src="{{url(asset('assets/profile/'.$user->profile))}}" alt="" width="200" height="200">
                           </div>
                       </div>
                       
                   </div>
                   <div class="col-md-8 col-8">
                       <div class="row my-3">
                           <div class="col-4">
                               Name
                           </div>
                           <div class="col-8">
                               {{$user->name}}
                           </div>
                       </div>
                       <div class="row my-3">
                           <div class="col-4">
                               Major
                           </div>
                           <div class="col-8">
                               {{$user->major->name}}
                           </div>
                       </div>
                       <div class="row my-3">
                           <div class="col-4">
                               Email
                           </div>
                           <div class="col-8">
                               {{$user->email}}
                           </div>
                       </div>
                       <div class="row my-3">
                           <div class="col-4">
                               Phone
                           </div>
                           <div class="col-8">
                               {{$user->phone}}
                           </div>
                       </div>
                       <div class="row my-3">
                           <div class="col-12">
                               <a href="{{url('change/password/'.$user->id)}}" class="btn btn-outline-danger">Change Password</a>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>

@endsection