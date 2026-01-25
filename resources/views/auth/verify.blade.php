@extends('layouts.auth')

@section('title', 'Email Verification')

@section('content')
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
          <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h4>{{ __('Verify Your Email Address') }}</h4>
          </div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Success</div>
                  {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
              </div>
            @endif

            <p class="text-muted">
              {{ __('Before proceeding, please check your email for a verification link.') }}
            </p>
            <p class="text-muted">
              {{ __('If you did not receive the email') }},
            </p>
            
            <form method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  {{ __('Click here to request another') }}
                </button>
              </div>
            </form>

            <div class="mt-3 text-center">
              <a href="{{ route('logout') }}" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        </div>
        
        <div class="simple-footer">
          Copyright &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
