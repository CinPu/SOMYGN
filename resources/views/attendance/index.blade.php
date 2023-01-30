@extends('layouts.app')
@section('title','Attendance List')
@section('content')
  <div class="row">
      <div class="card">
          <div class="row">
              <div class="col">
                  <h5 class="card-header">Attendance Record</h5>
              </div>

          </div>


          <div class="table text-nowrap" style="overflow:auto;">
              <table class="table" style="min-height: 200px" id="attendance">
                  <thead>
                  <tr>
                      <th>Date</th>
                      <th>Student Name</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                  </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                  @foreach($records as $record)
                      <tr class="table-default">
                          <td>{{\Carbon\Carbon::parse($record->date)->toFormattedDateString()}}</td>
                          <td>{{$record->student->name}}</td>
                          {{--<td>{{$->major->name}}</td>--}}
                          {{--<td>{{date('h:i a', strtotime($attendance->class_start_time))}}</td>--}}
                          <td>{{date('h:i a', strtotime($record->checkin))}}</td>
                          <td>
                              @if($record->checkout==null)
                                  N/A
                                  @else
                              {{date('h:i a', strtotime($record->checkout??'N/A'))}}
                                  @endif
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <script>
      $(document).ready(function () {
          $('#attendance').DataTable({
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ],
          });
      });

  </script>
@endsection