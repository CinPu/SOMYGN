
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="http://localhost:8000" class="app-brand-link">
                    {{--<span class="app-brand-logo demo">--}}
                        {{--<img src="{{url(asset('assets/profile/mainlogo.jpg'))}}" width="100" height="100" alt="">--}}
                    {{--</span>--}}
            <span class="demo menu-text fw-bold ms-2" style="font-size: 24px">School Of Music</span>
        </a>
        
    </div>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
            <a href="{{route('home')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>

        </li>
        <li class="menu-item {{ Request::is('user') ? 'active' : '' }}">
            <a href="{{route('user.index')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>User</div>
            </a>

        </li>
        <li class="menu-item {{ Request::is('major') ? 'active' : '' }}">
            <a href="{{route('major.index')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Major</div>
            </a>


        </li>
        <li class="menu-item {{ Request::is('students') ? 'active' : '' }}">
            <a href="{{route('students.index')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Student</div>
            </a>


        </li>
        <li class="menu-item ">
            <a href="{{route('attendance.index')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Attendance</div>
            </a>


        </li>
        <li class="menu-item ">
            <a href="{{route('payments.index')}}" class="menu-link" >
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Payments</div>
            </a>


        </li>
        {{--<li class="menu-item">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--<video id="preview" class="text-center"  style="width: 230px;height: 230px;padding-left: 30px;"></video>--}}
                {{--</div>--}}
                {{--<div class="col-12 text-center">--}}
                    {{--<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">--}}
                        {{--<label class="btn btn-primary active">--}}
                            {{--<input type="radio" name="options" value="1" autocomplete="off" checked> Front--}}
                        {{--</label>--}}
                        {{--<label class="btn btn-secondary">--}}
                            {{--<input type="radio" name="options" value="2" autocomplete="off"> Back--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</li>--}}
    </ul>
</aside>
