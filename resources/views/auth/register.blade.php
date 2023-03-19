@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="col-md-12 justify-content-center" style="display:flex;">
        <a href="{{url('/')}}">
            <img src="{{asset('admin/images/rgm.png')}}" height="150" alt="RGM">
        </a>
    </div>
    </br>
    </br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body log-card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a class="form-control fb-btn" href="{{ url('auth/facebook') }}">
                                Login with Facebook
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a class="form-control google-btn" href="{{ url('auth/google') }}">
                                Login with Google
                                <i class="fa fa-google"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <p class="text-muted text-center m-0"> - or - </p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="justify-content-end">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        </br>
                        <div class="row mb-0">
                            <div class="col-md-12 login-button-holder">
                                <button type="submit" class="btn subscribe-button">
                                    Subscribe
                                    <i class="fa fa-rss"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </br>
                <div class="d-flex justify-content-center">
                    Already have an account? <a href="{{ route('login') }}" class="blue-link">&nbsp;{{ __('Login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
</br></br></br>
@endsection
