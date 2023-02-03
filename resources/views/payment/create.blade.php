@extends('layouts.app')
@section('title','Payment Received')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Payment Received</h5>
            </div>
            <div class="card-body">
                <form action="{{route('payments.store')}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Student</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="fa fa-file-text"></i></span>
                                <select name="student_id" class="form-select" id="major">
                                    @foreach($student as $st)
                                        <option value="{{$st->id}}">{{$st->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('student_id')
                            <div class="form-text text-danger">Select Student</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Amount</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-money-bill"></i></span>
                                <input type="text" name="amount" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                            @error('fee')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Received</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection