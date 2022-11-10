@extends('layouts.app')
@section('title','Student')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col">
                <h5 class="card-header">User</h5>
            </div>
            <div class="col my-2 mx-2">
                <a href="{{route('user.create')}}" class="btn btn-primary float-end">Add</a>
            </div>
        </div>


        <div class="table text-nowrap">
            <table class="table" >
                <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Phone</th>

                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($users as $user)
                    <tr class="table-default">
                        <td><img src="{{url(asset('assets/profile/'.$user->profile))}}" alt="" width="40px" height="40px"></td>
                        <td>{{$user->name}}</td>
                        <td>
                            {{$user->major->name??'N/A'}}
                        </td>
                        <td>{{$user->email}}</td>
                        <td><span class="badge bg-label-primary me-1">{{$user->phone}}</span></td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('user.edit',$user->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
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