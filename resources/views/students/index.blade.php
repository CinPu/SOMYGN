@extends('layouts.app')
@section('title','Student')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Students</h5>
            </div>
           <div class="col my-2 mx-2">
               <a href="{{route('students.create')}}" class="btn btn-primary float-end">Add</a>
           </div>
        </div>


        <div class="table text-nowrap">
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
                       <td>
                           <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-vertical"></i></button>
                               <div class="dropdown-menu">
                                   <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                   <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                               </div>
                           </div>
                       </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection