@extends('layouts.app')
@section('title', 'Thank you for shopping with us')
@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if(session('message'))
                    <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                <div class="p-4 bg-white">
                    <img src="{{asset('admin/images/rgm.png?v=1.1')}}" alt="logo" width="350" style="height:auto;"/>
                    <h4>Thank you for shopping with {{$appSetting->website_name ?? 'Racing Green'}}! <br> Visit us again soon.</h4>
                    </br>
                    <a href="{{url('collections')}}" class="btn btn-primary">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
