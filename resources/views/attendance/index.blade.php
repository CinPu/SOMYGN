@extends('layouts.app')
@section('title','Attendance List')
@section('content')
  <div class="row">
      <div class="col-12 my-2">
          <div class="col my-2 mx-2">
              <a href="{{route('attendance.create')}}" class="btn btn-primary float-end">Create </a>
          </div>
      </div>
      <div class="card">
          <div class="row">
              <div class="col">
                  <h5 class="card-header">Attendance Record</h5>
              </div>

          </div>


          <div class="table text-nowrap" style="overflow:auto;">
              <table class="table" style="min-height: 200px">
                  <thead>
                  <tr>
                      <th>Date</th>
                      <th>Class</th>
                      <th>Class Started</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                  @foreach($attendance as $at)
                      <tr class="table-default">
                          <td>{{\Carbon\Carbon::parse($at->date)->toFormattedDateString()}}</td>
                          <td>{{$at->major->name}}</td>
                          <td>{{date('h:i a', strtotime($at->class_start_time))}}</td>
                          <td>{{$at->user->name}}</td>
                          <td>
                              <div class="row">
                                  <div class="col">
                                      <a href="{{url('record/attendance/'.$at->id)}}" class="btn btn-outline-info btn-sm">Take Attendance</a>
                                  </div>
                                  {{--<div class="col">--}}
                                  {{--<a class="btn btn-primary btn-sm" href="{{route('attendance.edit',$at->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>--}}

                                  {{--</div>--}}
                                  <div class="col">
                                      <a class="btn btn-info btn-sm" href="{{route('attendance.show',$at->id)}}"><i class="bx bx-edit-alt me-1"></i> Details</a>
                                  </div>

                                  <div class="col">
                                      <form action="{{route('attendance.destroy',$at->id)}}" method="POST" >
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                      </form>
                                  </div>
                              </div>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection