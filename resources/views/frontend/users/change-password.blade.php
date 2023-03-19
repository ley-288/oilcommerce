@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="New Password"/>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"/>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center mt-5">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                        </br>
                        </br>
                        <div class="row mb-0">
                            <div class="col-md-12 login-button-holder">
                                <a class="text-muted" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
