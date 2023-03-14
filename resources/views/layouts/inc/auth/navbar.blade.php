<div class="main-navbar sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <a class="navbar-brand brand-logo" href="{{url('/')}}" style="visibility:hidden;">
                        <ul class="nav justify-content-start flexed-nav">
                            <p class="headline-spot racing-green color-green headline-font">Racing Green Magazine</p>
                        </ul>
                    </a>
                </div>
                <div class="col-md-6 my-auto">
                    <ul class="nav justify-content-end">
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link subscribe-button" href="{{ route('register') }}">
                                    Subscribe
                                    <i class="fa fa-rss"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#" style="visibility:hidden;">
                <p class="m-headline headline-spot racing-green color-green headline-font" style="margin-left:0;">Racing Green</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border:none;">
                <span class="mobile-bars fa fa-bars black-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center mobile-overlay">
                    <div class="link-hover" style="text-align: center;">
                        <a class="link-hover" href="{{ url('/') }}" style="color:white;"><p class="link-hover-font">Home</p></a>
                        <a class="link-hover" href="{{ url('/article') }}" style="color:white;"><p class="link-hover-font">Articles</p></a>
                        </br>
                    </div>
                    </br>
                    </br>
                    <div class="mobile-nav-lower">
                        Follow us
                        @if($appSetting->facebook)
                            <a href="{{$appSetting->facebook}}" target="_blank" style="margin-left:20px;"><i class="fa fa-facebook social-white"></i></a>
                        @endif
                        @if($appSetting->twitter)
                            <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter social-white"></i></a>
                        @endif
                        @if($appSetting->instagram)
                            <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram social-white"></i></a>
                        @endif
                        <hr>
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="nav-link subscribe-button" href="{{ route('register') }}">
                                    Subscribe
                                    <i class="fa fa-rss"></i>
                                </a>
                            @endif
                        @else
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
