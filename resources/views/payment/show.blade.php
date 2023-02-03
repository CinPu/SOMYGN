@extends('layouts.app')
@section('title','Payment Receipt')
@section('content')

    <div class="col-xxl">
        <div class="col-md-12 col-12 my-3" id="DivIdToPrint">
            <div class="border" id="print_me">
                <div class="col-12">
                    <div class="row my-5 mx-3">
                        <div class="col-md-3 col-4">
                            <img src="{{url(asset('assets/profile/mainlogo.jpg'))}}" alt="" width="100" height="100">
                        </div>
                        <div class="col-md-6 col-6">
                            <h3 align="center">School Of Music</h3>
                            <h6 align="center">အမှတ် ၂၈(က)၊ ၀ါးခယ်မလမ်း၊ စမ်းချောင်းမြို့</h6>
                            <h6 align="center">Ph-09789308567</h6>
                        </div>
                    </div>
                    <div class="row mx-3 my-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    Student ID
                                </div>
                                <div class="col-6">
                                    {{$payment->student->student_id}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 my-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    Student Name
                                </div>
                                <div class="col-6">
                                    {{$payment->student->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 my-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    Receiver Name
                                </div>
                                <div class="col-6">
                                    {{$payment->user->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 my-2">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    Amount
                                </div>
                                <div class="col-6">
                                    {{$payment->amount}} MMK
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-3 my-2 mb-5">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    Received Date
                                </div>
                                <div class="col-6">
                                    {{$payment->created_at->toFormattedDateString()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="print_me"  style="visibility: hidden"></div>
        <a href="" id="print" class="btn btn-primary" onclick="printContent('print_me');" ><i class="fa fa-print"></i> Print Receipt</a>

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