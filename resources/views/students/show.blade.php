@extends('layouts.app')
@section('title','Student Details')
@section('content')

    <div class="col-xxl">
        <div class="col-md-8 col-6 my-3" id="DivIdToPrint" hidden>
            <div class="card shadow border" id="print_me" style="height: 250px;width: 450px;">
                <div class="col-12 my-3 mx-2">
                    <div class="row ">
                        <div class="col-md-3 col-3">
                                <img src="{{url(asset('assets/profile/'.$student->profile))}}" alt="" width="100" height="100">
                            <div class="col-2 col-md-2 my-5">{!! DNS2D::getBarcodeSVG($student->student_id, 'QRCODE',3,3);!!}</div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="col-12 text-center">
                                <h5>School Of Music</h5>
                            </div>

                            <div class="row my-3">
                                <div class="col-4">
                                    Name
                                </div>
                                <div class="col-8">
                                    {{$student->name}}
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-4">
                                    ID
                                </div>
                                <div class="col-8">
                                    {{$student->student_id}}
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-4">
                                    Major
                                </div>
                                <div class="col-8">
                                    {{$student->major->name}}
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-4">
                                    Minor
                                </div>
                                <div class="col-8">
                                    {{$student->minor1->name??'N/A'}},{{$student->minor2->name??''}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card shadow">
                    <img src="{{url(asset('assets/profile/'.$student->profile))}}" alt="" width="100px" height="100px">
                </div>
            </div>
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-3">
                        Name

                    </div>
                    <div class="col-9">
                        {{$student->name}}
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Student Id

                    </div>
                    <div class="col-9">
                        {{$student->student_id}}
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Major

                    </div>
                    <div class="col-9">
                        {{$student->major->name}}
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Minor

                    </div>
                    <div class="col-9">
                        {{$student->minor1->name??'N/A'}},{{$student->minor2->name??'N/A'}}
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Elective Course

                    </div>
                    <div class="col-9">
                        {{$student->elective_course==1?'Taken':'Not Taken'}}
                    </div>

                </div>

                <div class="row my-2">
                    <div class="col-3">
                        Fee

                    </div>
                    <div class="col-9">
                        {{$student->fee}} MMK
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Paid
                    </div>
                    <div class="col-9">
                        {{$student->paid}} MMK
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Remaing
                    </div>
                    <div class="col-9">
                        {{$student->fee - $student->paid}} MMK
                    </div>

                </div>
                <div class="row my-2">
                    <div class="col-3">
                        Register Date
                    </div>
                    <div class="col-9">
                        {{$student->created_at->toFormattedDateString()}}
                    </div>

                </div>

               <div>

               </div>
            </div>
        </div>
        <div id="print_me"  style="visibility: hidden"></div>
            <a href="" id="print" class="btn btn-primary" onclick="printContent('print_me');" ><i class="fa fa-print"></i> Print Card</a>

    </div>

    <script>
        function printContent(el){
            // document.title = ;
            var restorepage = $('body').html();
            $('#myTab').remove();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            $('.footer').hide();
            window.print();
            $('body').html(restorepage);
        }
    </script>
@endsection