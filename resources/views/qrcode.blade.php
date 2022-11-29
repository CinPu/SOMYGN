@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4 ">
            <div class="col-12">
                <video id="preview" class="text-center"  style="width: 300px;height: 300px"></video>
            </div>

            <div class="col-12 text-center">
                <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                    </label>
                </div>
            </div>

        </div>
        <div class="col-8" id="attendance">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        Student Name
                    </th>
                    <th>
                        Attendance Status
                    </th>
                    <th>Present Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $rd)
                    <tr>
                        <td>{{$rd->student->name}}</td>
                        <td>{{$rd->present?'Present':'Absent'}}</td>
                        <td>{{$rd->present?date('h:i a', strtotime($rd->present_time)):''}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <script src="{{url(asset('js/http_rawgit.com_schmich_instascan-builds_master_instascan.min.js'))}}"></script>
    <script type="text/javascript">
        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
        scanner.addListener('scan',function(content){
            if(content==''){

            }else {
                newfunction(content)
                alert(content+' is present now!');
            }
            //window.location.href=content;
        });
        function newfunction(qrcode){
            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'student_id':qrcode

                },
                url: "{{url('record/attendance/'.$attendance->id)}}",
                headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success: function (data) {
                    console.log(data);

                    console.log(data);
                    $("#attendance").load(location.href + " #attendance>* ");

                },
                error: function(data){
                    alert('hello')
                }


            });
        }
        Instascan.Camera.getCameras().then(function (cameras){
            if(cameras.length>0){
                scanner.start(cameras[0]);
                $('[name="options"]').on('change',function(){
                    if($(this).val()==1){
                        if(cameras[0]!=""){
                            scanner.start(cameras[0]);
                        }else{
                            alert('No Front camera found!');
                        }
                    }else if($(this).val()==2){
                        if(cameras[1]!=""){
                            scanner.start(cameras[1]);
                        }else{
                            alert('No Back camera found!');
                        }
                    }
                });
            }else{
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e){
            console.error(e);
            alert(e);
        });
    </script>
    @endsection