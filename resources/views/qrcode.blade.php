@extends('layouts.app')
@section('content')
    <div class="col-md-4 offset-md-4">
        <div class="col-12">
            <video id="preview" class="text-center"  style="width: 400px;height: 400px"></video>

        </div>

        <script src="{{url(asset('js/http_rawgit.com_schmich_instascan-builds_master_instascan.min.js'))}}"></script>
        <script type="text/javascript">
            var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
            scanner.addListener('scan',function(content){
                if(content==''){

                }else {
                    alert(content);
                    newfunction(content);
                }
                //window.location.href=content;
            });
            function newfunction(qrcode){
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name: 'Hello',
                        fee:2000,
                        period: '3month',


                    },
                    url: "{{route('major.store')}}",
                    headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success: function (data) {
                        console.log(data);

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
    @endsection