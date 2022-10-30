@extends('layouts.app')
@section('title','Student Create')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Major</h5>
            </div>
            <div class="card-body">
                <form action="{{route('major.store')}}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-file-text"></i></span>
                                <input type="text" class="form-control" name="name" id="basic-icon-default-fullname" placeholder="Major Name" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            @error('name')
                            <div class="form-text">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Fee</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-money-bill"></i></span>
                                <input type="text" name="fee" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                        </div>
                        @error('fee')
                        <div class="form-text">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Period</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="period" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                        </div>
                        @error('period')
                        <div class="form-text">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection