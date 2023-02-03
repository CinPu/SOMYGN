@extends('layouts.app')
@section('title','Student List')
@section('content')
    <div class="card">
       <div class="col-12">
           <div class="row">
               <div class="col">
                   <h5 class="card-header">Students</h5>
               </div>
               <div class="col my-2 mx-2">
                   <a href="{{route('students.create')}}" class="btn btn-primary float-end">Add</a>
               </div>
           </div>
           <div class="col-12">
               <div class="table text-nowrap my-2 mx-2" style="overflow:auto;">
                   <table class="table" style="min-height: 200px" id="student">
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
                           <th>Action</th>
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
                               <td title="Hello">{{$st->minor1->name??'Removed This Minor'}}</td>
                               <td>{{$st->minor2->name??'N/A'}}</td>
                               <td>{{$st->elective_course==0?'N/A':'Take'}}</td>
                               <td><span class="badge bg-label-primary me-1">{{$st->fee}}</span></td>
                               <td><span class="badge bg-label-success me-1">{{$st->paid}}</span></td>
                               <td><span class="badge bg-label-danger me-1">{{$st->fee-$st->paid}}</span></td>
                               <td>

                                   <div class="row">
                                       <div class="col-4">
                                           <a class="" href="{{route('students.edit',$st->id)}}"><i class="fa fa-edit"></i> </a>
                                       </div>
                                       <div class="col-4">
                                           <a class="" href="{{route('students.show',$st->id)}}"><i class="fa fa-file-text"></i> </a>
                                       </div>
                                       {{--<div class="col-4">--}}
                                           {{--<a class="" href="{{route('students.show',$st->id)}}"><i class="fa fa-trash"></i> </a>--}}
                                       {{--</div>--}}

                                   </div>

                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#student').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv',
                    'excel',
                    'pdf',
                    'copy'
                ],
            });
        });

    </script>
    @endsection