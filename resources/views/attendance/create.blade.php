@extends('layouts.app')
@section('title','Attendance Record Create')
@section('content')

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Create Attendance Record</h5>
            </div>
            <div class="card-body">
                <form action="{{route('attendance.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Major</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select name="major_id" class="form-select" id="major">
                                    @foreach($major as $mj)
                                        <option value="{{$mj->id}}">{{$mj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('major_id')
                            <div class="form-text text-danger">Select Major</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            @error('date')
                            <div class="form-text text-danger">{{$messsage}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Start Time</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="datetime-local" class="form-control" id="date_time" name="start_time">
                            </div>
                            @error('date')
                            <div class="form-text text-danger">Select Major</div>
                            @enderror
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection