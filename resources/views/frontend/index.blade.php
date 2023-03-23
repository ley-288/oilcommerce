@extends('layouts.app')
@section('title', 'Casa Camilloni')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="cold-md-12 d-flex justify-content-center">
                <img src="{{asset('admin/images/bottle.png?v=1.1')}}" alt="logo" width="1000" style="height:auto;"/>
            </div>
            <div class="col-md-8 text-center">
                <h4>100% Extra Virgin Olive Oil</h4>
                <div class="underline mx-auto"></div>
                <p>We have been growing olives in our orchard for over 100 years. We cultivate by hand and all of the growth and production is done in the traditional way, entirely by our family.</p>
            </div>
        </div>
    </div>
</div>

@endsection
