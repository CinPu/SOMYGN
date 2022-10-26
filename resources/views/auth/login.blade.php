<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background-image: url("../assets/school-of-music-banner.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            position: fixed;
            width: 100%;
        }
    </style>
    @include('layouts.header')
</head>
<body>

<div class="bg">
    <div class="col-md-4 offset-md-8 col-10 offset-1 col-sm-10 offset-sm-1 my-5">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y my-5">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <a href="{{url('/')}}" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
                                    <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Welcome to School Of Music</h4>
                            <p class="mb-4">Please sign-in to your account </p>

                            <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        <a href="{{url('auth/forgot-password-basic')}}">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>





