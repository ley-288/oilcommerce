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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body log-card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="justify-content-end">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Enter email address" readonly style="padding: 0;border: none;pointer-events: none;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus required autocomplete="new-password" placeholder="New Password">
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</br></br></br>
@endsection
