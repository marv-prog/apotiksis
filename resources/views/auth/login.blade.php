<!doctype html>
<html lang="en">
  <head>
    <title>APOTIKSIS - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets-login/css/style.css') }}">

  </head>
  <body>
  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-6 text-center mb-5">
                  <h2 class="heading-section" style="color: #2d5766; font-weight: bold;">SELAMAT DATANG DI APOTIKSIK</h2>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-7 col-lg-5">
                  <div class="wrap">
                      <div class="img" style="background-image: url({{ asset('assets-login/images/bg-1.jpg') }});"></div>
                      <div class="login-wrap p-4 p-md-5">

                  <div class="d-flex">
                      <div class="w-100">
                          <h3 class="mb-4">Sign In</h3>
                      </div>
                      <div class="w-100">
                          <p class="social-media d-flex justify-content-end">
                              <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                              <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                          </p>
                      </div>
                  </div>

                  @if($errors->any())
                      <div class="alert alert-danger text-center small py-2 mb-3" style="border-radius: 5px;">
                          {{ $errors->first() }}
                      </div>
                  @endif

                  <form action="{{ route('login') }}" method="POST" class="signin-form">
                      @csrf

                      <div class="form-group mt-3">
                          <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                          <label class="form-control-placeholder" for="username">Email Address</label>
                      </div>

                      <div class="form-group">
                        <input id="password-field" type="password" name="password" class="form-control" required>
                        <label class="form-control-placeholder" for="password">Password</label>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background: #325a66; border-color: #325a66;">Sign In</button>
                      </div>

                      <div class="form-group d-md-flex">
                          <div class="w-50 text-left">
                              <label class="checkbox-wrap checkbox-primary mb-0" style="color: #325a66;">Remember Me
                                  <input type="checkbox" checked>
                                  <span class="checkmark" style="background-color: #325a66;"></span>
                              </label>
                          </div>
                          <div class="w-50 text-md-right">
                              <a href="#" style="color: #325a66;">Forgot Password</a>
                          </div>
                      </div>
                  </form>
                  <p>Belum punya akun? <a href="{{ route('register') }}" class="font-weight-bold" style="color: #325a66;">Daftar di sini</a></p>
              </div>
            </div>
              </div>
          </div>
      </div>
  </section>

  <script src="{{ asset('assets-login/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets-login/js/popper.js') }}"></script>
  <script src="{{ asset('assets-login/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets-login/js/main.js') }}"></script>

  </body>
</html>