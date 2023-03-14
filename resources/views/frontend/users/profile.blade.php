@extends('layouts.app')
@section('title', 'Profile')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h3>{{Auth::user()->name}}</h3>
                            <h4 class="text-muted">{{Auth::user()->email}}</h4>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-5">
                            <a href="{{url('/favourites')}}" class="fav-button">
                                Favourite Articles
                                <i class="fa fa-heart"></i>
                            </a>
                        </div>
                        {{--
                        <form action="{{url('/profile')}}" method="POST" class="mt-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="text" name="email" readonly value="{{Auth::user()->email}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{Auth::user()->userDetail->phone ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Zip</label>
                                            <input type="text" name="pincode" value="{{Auth::user()->userDetail->pincode ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="3">{{Auth::user()->userDetail->address ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center mt-5">
                                    <button type="submit" class="btn btn-primary center">Save</button>
                                </div>
                            </div>
                        </form>
                        --}}
                        </br>
                        </br>
                        </br>
                        <div class="col-md-12 d-flex justify-content-center">
                            <a href="{{url('/change-password')}}" class="btn btn-warning float-end">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
