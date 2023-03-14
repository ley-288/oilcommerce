@extends('layouts.app')
@section('title', 'About Racing Green')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="col-md-12 justify-content-center" style="display:flex;">
                <a href="{{url('/')}}">
                    <img src="{{asset('admin/images/rgm.png')}}" height="150" alt="RGM">
                </a>
            </div>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <p class="headline-spot racing-green color-green headline-font" style="font-size:1rem;">Racing Green Magazine</p>
                        </div>
                        </br>
                        </br>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="article-sub text-bold">About Us</h4>
                            <h5 class="text-muted">Racing Green is a classic motorracing and vintage lifestyle magazine, written by our team of nerds. We hope to bring you quality content you'll enjoy and we hope you subscribe to our website because you can't get enough! </br></br> Racing Green is based in Rome, Italy, since 2023. </h5>
                            </br>
                        </div>
                        <hr>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="article-sub text-bold">Contact Us</h4>
                            <h5 class="text-muted">You can contact us directly with any questions or queries you may have, and you can also follow us across social media to keep updated to our latest news and posts.</h5>
                            <div class="mobile-nav-lower" style="color:black;">
                            <p>Follow Us</p>
                            </br>
                            <div class="d-flex justify-content-center">
                                @if($appSetting->facebook)
                                    <a href="{{$appSetting->facebook}}" target="_blank" class="share-home facebook-icon"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($appSetting->twitter)
                                    <a href="{{$appSetting->twitter}}" target="_blank"  class="share-home twitter-icon"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if($appSetting->instagram)
                                    <a href="{{$appSetting->instagram}}" target="_blank"  class="share-home instagram-icon"><i class="fa fa-instagram"></i></a>
                                @endif
                            </div>
                            </br>
                        </div>
                        <hr>
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <h4 class="article-sub text-bold">Contribute</h4>
                            <h5 class="text-muted">Our articles take time. We are always trying to add new content but sometimes we need help. We dont ask for money we ask that if you have an interest or passion in motorsports and would like to contribute an article to the website.. you can be featured here with us. If you have any interest in helping us write articles, please click the contact us button!</h5>
                            </br>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-5">
                                <a href="{{url('/favourites')}}">
                                    <button type="submit" class="btn btn-danger center"><i class="fa fa-envelope"></i> Contact Us</button>
                                </a>
                            </div>
                            </br>
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
