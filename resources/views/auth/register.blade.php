<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Inventory | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.1.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page bg-secondary">
<div class="register-box">
  

  <div class="card bg-dark">
    <div class="card-body register-card-body bg-dark">
      <div class="card-body login-card-body bg-dark">
        <div class="text-center">
        <h1 class="h4 text-primary mb-4">Registration</h1>
    </div>

      <form action="/register" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user text-white"></span>
            </div>
          </div>
        </div>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-white"></span>
            </div>
          </div>
        </div>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address/Class" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home text-white"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-white"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="confirmation" id="confirmation" class="form-control @error('confirmation') is-invalid @enderror" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-white"></span>
            </div>
          </div>
        </div>
        @error('confirmation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      
          <!-- /.col -->
          <div class="col-15">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="text-center">
        Already have account?<a class="" href="{{ url('login') }}">Login here</a>
    </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>
</body>
</html>


