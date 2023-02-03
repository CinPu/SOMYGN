@extends('layouts.app')
@section('title','Student Edit')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Student</h5>
            </div>
            <div class="card-body">
                <form action="{{route('students.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Profile</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-id-card text-dark"></i></span>
                                <input type="file" class="form-control" name="profile"id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly/>
                            </div>
                            @error('student_id')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Student ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-id-card text-dark"></i></span>
                                <input type="text" class="form-control" name="student_id" value="{{$student->student_id}}" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" readonly/>
                            </div>
                            @error('student_id')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{$student->name}}" />
                            </div>
                            @error('name')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Major</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="fa fa-file-text"></i></span>
                                <select name="major_id" class="form-select" id="major">
                                    @foreach($major as $mj)
                                        <option value="{{$mj->id}}" {{$student->major_id==$mj->id?'selected':''}}>{{$mj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('major_id')
                            <div class="form-text text-danger">Select Major</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Minor One</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="fa fa-file-text"></i></span>
                                <select name="minor1_id" class="form-select" id="major" required>
                                    @foreach($major as $mj)
                                        <option value="{{$mj->id}}" {{$student->minor1_id==$mj->id?'selected':''}}>{{$mj->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('minor1_id')
                            <div class="form-text">Select Minor One</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Minor Two(optional)</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="fa fa-file-text"></i></span>
                                <select name="minor2_id" class="form-select" id="major">
                                    <option value="">Select Minor Two</option>
                                    @foreach($major as $mj)
                                        <option value="{{$mj->id}}" {{$student->minor2_id==$mj->id?'selected':''}}>{{$mj->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Elective Course</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">

                                <input type="checkbox" name="elective_course" value="1" {{$student->elective_course==1?'checked':''}}>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" name="email" value="{{$student->email}}" class="form-control" placeholder="Enter Email" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                            </div>
                            @error('email')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-phone"></i></span>
                                <input type="text" name="phone" value="{{$student->phone}}" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                            @error('phone')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Fee</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-money-bill"></i></span>
                                <input type="text" name="fee"  value="{{$student->fee}}" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                            @error('fee')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Cash Down</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="fa fa-money-bill"></i></span>
                                <input type="text" name="paid" value="{{$student->paid}}" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
                            </div>
                            @error('fee')
                            <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection