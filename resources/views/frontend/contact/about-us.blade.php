@extends('layouts.app')
@section('title', 'About Racing Green')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <p class="headline-spot racing-green color-green headline-font" style="font-size:1rem;">Racing Green Magazine</p>
                        </div>
                        </br>
                        </br>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-bold">About Us</h4>
                        </div>
                        <hr>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-bold">Contact Us</h4>
                        </div>
                        <hr>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-bold">Contribute</h4>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-5">
                            <a href="{{url('/favourites')}}">
                                <button type="submit" class="btn btn-danger center"><i class="fa fa-envelope"></i> Contact Us</button>
                            </a>
                        </div>
                        </br>
                        </br>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
