@extends('layouts.app')
@section('title','Student')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">Majors</h5>
            </div>
            <div class="col my-2 mx-2">
                <a href="{{route('major.create')}}" class="btn btn-primary float-end">Add</a>
            </div>
        </div>


        <div class="table text-nowrap">
            <table class="table" >
                <thead>
                <tr>

                    <th>Name</th>
                    <th>Fee</th>
                    <th>Period</th>

                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($major as $mj)
                    <tr class="table-default">

                        <td>{{$mj->name}}</td>
                        <td>
                            {{$mj->fee}}
                        </td>
                        <td><span class="badge bg-label-primary me-1">{{$mj->period}}</span></td>

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