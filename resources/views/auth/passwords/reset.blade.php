<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Password &mdash; {{ config('app.name') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}' />
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #app {
      width: 100%;
    }
    .section {
      padding: 0;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                <p class="text-muted">Enter your new password</p>
                
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{ session('status') }}
                      </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" tabindex="1" required autofocus>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="3" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script>
    // Disable template scripts that load navbar/sidebar
    if (typeof initSidebar !== 'undefined') {
      initSidebar = function() {};
    }
  </script>
</body>
</html>
