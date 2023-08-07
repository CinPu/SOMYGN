<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Apply the background image to the <body> element for full-page coverage */
        body {
            /* The image used */
            background-image: url("../assets/bg2.png");

            /* Full height and width */
            height: 100%; /* 100% of the viewport height */
            width: 100%; /* 100% of the viewport width */

            /* Center the image horizontally and vertically */
            background-position: center;
            background-repeat: no-repeat;

            /* Scale the image to cover the entire element */
            background-size: cover;

            /* Make the background fixed while the content scrolls */
            background-attachment: fixed;

        }

    </style>
    @include('layouts.header')
</head>
<body style="background-color:#b0b5b7">


    <div class="col-xl-4 col-md-6 offset-xl-8 offset-md-3 col-12 offset-0 col-sm-12 offset-sm-0 my-5 ">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y my-5">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-6">
                                        <a href="{{url('/')}}" class="app-brand-link gap-2">
                                            <span class="app-brand-logo demo"><img src="{{url(asset('assets/logo.png'))}}" class="rounded-circle" width="5%"></span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h4 class="mb-2">Welcome to</h4>
                                        <h4>School Of Music</h4>
                                        <p class="mb-4">Please sign-in to your account </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /Logo -->


                            <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        <a href="{{url('forgot/password')}}">
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

@include('layouts.footer')
</body>
</html>





