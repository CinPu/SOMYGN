@extends('layouts.app')
@section('title','Student Create')
@section('content')

    <div class="col-xxl">
        <div class="col-md-4 col-4 my-3" id="print_me">
            <div class="card">
                <div class="col-12 my-3 mx-2">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <img src="{{url(asset('assets/profile/'.$student->profile))}}" alt="">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="col-12 text-center">
                                <h5>School Of Music</h5>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    Name
                                </div>
                                <div class="col-6">
                                    {{$student->name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    ID
                                </div>
                                <div class="col-9">
                                    {{$student->student_id}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row my-2 mr-5">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    Major
                                </div>
                                <div class="col-8">
                                    {{$student->major->name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    Minor
                                </div>
                                <div class="col-8">
                                    {{$student->minor1->name}},{{$student->minor2->name}}
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-md-3">
                            {!! DNS2D::getBarcodeHTML($student->student_id, 'QRCODE',3,3);!!}
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
                <div class="row">
                    <div class="col-6">
                        Name

                    </div>
                    <div class="col-6">
                        {{$student->name}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        Student Id

                    </div>
                    <div class="col-6">
                        {{$student->student_id}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        Major

                    </div>
                    <div class="col-6">
                        {{$student->major->name}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        Minor

                    </div>
                    <div class="col-6">
                        {{$student->minor1->name}},{{$student->minor2->name}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        Elective Course

                    </div>
                    <div class="col-6">
                        {{$student->elective_course==1?'Taken':'Not Taken'}}
                    </div>

                </div>
               <div>

               </div>

            </div>
        </div>

        <div id="print_me" style="visibility: hidden"></div>
        {{--<button type="button" class="btn btn-primary my-3" id="btn"  ><i class="fa fa-print mr-2"></i>Print Card</button>--}}
    </div>

    <script>
        $("#btn").on('click', function(){
            html2canvas($("#print_me"), {
                onrendered: function (canvas) {
                    var url = canvas.toDataURL();

                    var triggerDownload = $("<a>").attr("href", url).attr("download", getNowFormatDate()+"电子签名详细信息.jpeg").appendTo("body");
                    triggerDownload[0].click();
                    triggerDownload.remove();
                }
            });
        })
    </script>
@endsection