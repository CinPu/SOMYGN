@extends('layouts.app')
@section('title','Payment History')
@section('content')
    <div class="card">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <h5 class="card-header">Payments</h5>
                </div>
                <div class="col my-2 mx-2">
                    <a href="{{route('payments.create')}}" class="btn btn-primary float-end">Add</a>
                </div>
            </div>
            <div class="col-12">
                <div class="table text-nowrap my-2 mx-2" style="overflow:auto;">
                    <table class="table" style="min-height: 200px" id="student">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Receiver Name</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($payments as $py)
                            <tr>
                                <td>{{$py->created_at->toFormattedDateString()}}</td>
                                <td>{{$py->student->name}}</td>
                                <td>{{$py->user->name}}</td>
                                <td>{{$py->amount}}</td>
                                <td>
                                    <a href="{{route('payments.show',$py->id)}}"> <i class="fa fa-file-text"></i></a>
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