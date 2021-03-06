<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdminLogin</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin-theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet"  type="text/css">
    <link href="https://fonts.googleapis.com/?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin-theme/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        .bg-login-image{background-image: url({{asset('admin-theme/img/islam.jpg')}})}
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                           <div class="col-lg-6">
                             <div class="p-5">
                                 <div class="text-center">
                                     <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('check.admin.login')}}">
                                        @csrf
                                        <div class="form-group">
                                          <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                                  @error('email')
                                                     <span class="text-danger">{{$message}} </span>
                                                   @enderror
                                                    @if(Session::has('failed'))
                                                    <span class="text-danger">{{Session::get('failed')}} </span>
                                                    @endif
                                        </div>
                                        <div class="form-group">
                                          <input name="password" type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password">
                                               @error('password')
                                               <span class="text-danger">{{$message}} </span>
                                                @enderror
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block">login</button>
                                        <hr>
                                        
                                        
                                    </form>
                                    
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin-theme/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin-theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin-theme/js/sb-admin-2.min.js')}}"></script>

</body>

</html>