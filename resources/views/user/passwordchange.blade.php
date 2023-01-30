@extends('layouts.app')
@section('title','User Edit')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Password Change</h5>
            </div>
            <div class="card-body">
                <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Old Password</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="oldpass"  id="basic-icon-default-fullname"  aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            @error('oldpass')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">New Password</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="newpass"  id="basic-icon-default-fullname"  aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            @error('newpass')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection