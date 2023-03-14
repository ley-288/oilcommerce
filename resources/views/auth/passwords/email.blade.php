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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}"  class="justify-content-end">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </br>
                        <div class="row mb-0">
                            <div class="col-md-12 login-button-holder">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
