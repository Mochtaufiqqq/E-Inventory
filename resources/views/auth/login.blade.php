<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Inventory | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page bg-secondary">
    <div class="login-box">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center mt-5 mb-5" data-bs-dismiss="alert"
            aria-label="Close">
            {{ session('success') }}
        </div>
        @endif
        <!-- /.login-logo -->
        <div class="card bg-dark">
            <div class="card-body login-card-body bg-dark">
                @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show text-center mt-2 mb-2"
                    data-bs-dismiss="alert" aria-label="Close">
                    {{ session('loginError') }}
                </div>
                @endif
                <div class="text-center">
                    <h1 class="h4 text-primary mb-4">Welcome</h1>
                </div>
                <form action="/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="text-white fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="text-white fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <div class="col-15">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>
            <div class="text-center text-white">
                Not have account?<a class="" href="{{ url('register') }}">Register here</a>
            </div>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>


    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4 -->
   
    <script src="AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>

    
</body>

</html>


