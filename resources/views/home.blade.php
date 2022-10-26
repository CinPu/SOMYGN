@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8 order-3 order-md-2 order-1">
            <div class="card" style="min-height: 400px;max-height: 400px;overflow: auto">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Total Fee</th>
                        <th>Paid Fee</th>
                        <th>Due Fee</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($student as $st)
                        <tr class="table-default">
                            <td><strong>{{$st->student_id}}</strong></td>
                            <td>{{$st->name}}</td>
                            <td>
                                {{$st->major->name}}
                            </td>
                            <td><span class="badge bg-label-primary me-1">{{$st->fee}}</span></td>
                            <td><span class="badge bg-label-success me-1">{{$st->paid}}</span></td>
                            <td><span class="badge bg-label-danger me-1">{{$st->fee-$st->paid}}</span></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-2">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{url(asset('assets/icons/unicons/wallet.png'))}}" alt="chart success" class="rounded">
                                </div>
                                <span class="fw-semibold d-block mb-1">Due</span>
                            </div>

                            <h6 class="card-title mb-2">{{$due}} MMK</h6>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{url(asset('assets/icons/unicons/wallet-info.png'))}}" alt="chart success" class="rounded">
                                </div>
                                <span class="fw-semibold d-block mb-1">Paid</span>
                            </div>

                            <h6 class="card-title mb-2">{{$paid}} MMK</h6>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{url(asset('assets/icons/unicons/wallet.png'))}}" alt="chart success" class="rounded">
                                </div>
                                <span class="fw-semibold d-block mb-1">Total Fee</span>
                            </div>

                            <h6 class="card-title mb-2">{{$paid+$due}} MMK</h6>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                  <i class="fa fa-user" style="font-size: 24px"></i>
                                </div>
                                <span class="fw-semibold d-block mb-1">Student</span>
                            </div>

                            <h6 class="card-title mb-2">{{count($student)}} </h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
