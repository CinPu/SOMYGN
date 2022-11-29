@extends('layouts.app')
@section('title','Student List')
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


        <div class="table text-nowrap" style="overflow:auto;">
            <table class="table" style="min-height: 200px">
                <thead>
                <tr>
                    <th>Profile</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Minor One</th>
                    <th>Minor Two</th>
                    <th>Elective Course</th>
                    <th>Total Fee</th>
                    <th>Paid Fee</th>
                    <th>Due Fee</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
               @foreach($student as $st)
                   <tr class="table-default">
                       <td><img src="{{asset('assets/profile/'.$st->profile)}}" style="max-height: 40px;max-width: 40px" alt=""></td>
                       <td><strong>{{$st->student_id}}</strong></td>
                       <td>{{$st->name}}</td>
                       <td>
                           {{$st->major->name??'Removed This Major'}}
                       </td>
                       <td>{{$st->minor1->name??'Removed This Minor'}}</td>
                       <td>{{$st->minor2->name??'N/A'}}</td>
                       <td>{{$st->elective_course==0?'N/A':'Take'}}</td>
                       <td><span class="badge bg-label-primary me-1">{{$st->fee}}</span></td>
                       <td><span class="badge bg-label-success me-1">{{$st->paid}}</span></td>
                       <td><span class="badge bg-label-danger me-1">{{$st->fee-$st->paid}}</span></td>
                       <td>
                           <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-vertical"></i></button>
                               <div class="dropdown-menu">
                                   <a class="dropdown-item" href="{{route('students.edit',$st->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                   <a class="dropdown-item" href="{{route('students.show',$st->id)}}"><i class="bx bx-edit-alt me-1"></i> Details</a>
                                   <form action="{{route('students.destroy',$st->id)}}" method="POST" >
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="dropdown-item">Delete</button>
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
    @endsection