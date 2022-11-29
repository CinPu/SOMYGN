@extends('layouts.app')
@section('title','Attendance Details')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Attendance Record</h5>
            </div>
        </div>
        <table class="table" style="min-height: 200px">
            <thead>
            <tr>
                <th>Date</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Class Started</th>
                <th>Attendance</th>
                <th>Comment</th>
                <th>Late Min</th>
                <th>Created By</th>

            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($records as $record)
                <tr class="table-default">
                    <td>{{\Carbon\Carbon::parse($attendance->date)->toFormattedDateString()}}</td>
                    <td>{{$record->student->name}}</td>
                    <td>{{$attendance->major->name}}</td>
                    <td>{{date('h:i a', strtotime($attendance->class_start_time))}}</td>
                    <td>{{$record->present?'Present':'Absent'}}</td>
                    <td>{{date('h:i a', strtotime($record->present_time))}}</td>
                    <td>
                        @if($record->present_time>$attendance->class_start_time)
                        <span class="text-danger">{{$record->present?\Carbon\Carbon::parse($record->present_time)->diffInMinutes($attendance->class_start_time,$record->present_time):''}} min late</span>
                        @else

                        @endif
                    </td>
                    <td>{{$attendance->user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection