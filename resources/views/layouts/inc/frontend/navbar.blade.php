<div class="main-navbar">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 my-auto">
                    <a class="navbar-brand brand-logo" href="{{url('/')}}">
                        <ul class="nav justify-content-start flexed-nav">
                            <p class="headline-spot racing-green color-green headline-font">RacingGreenMagazine</p>
                        </ul>
                    </a>
                </div>
                <div class="col-md-3 my-auto">
                    @guest
                        <ul class="nav justify-content-end flexed-nav">
                            <a class="btn subscribe-button" href="{{ route('register') }}">
                                Subscribe
                                <i class="fa fa-rss"></i>
                            </a>
                        </ul>
                    @else
                        <ul class="nav justify-content-end flexed-nav">
                            <a class="btn fav-button" href="{{ url('/favourites') }}">
                                Favourites
                                <i class="fa fa-heart"></i>
                            </a>
                        </ul>
                    @endguest
                </div>
                <div class="col-md-1 my-auto">
                    <ul class="nav justify-content-end flexed-nav">
                        <a class="nav-link" href="#" id="navbarDropdown">
                            <i class="fa fa-bars" id="closure-icon"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="top-navbar under-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <div class="navbar-brand brand-logo" href="#" id="share-image">
                    </div>
                </div>
                <div class="col-md-5 my-auto share-title">
                </div>
                <div class="col-md-6 my-auto">
                    <ul class="nav justify-content-end">
                        <div class="nav-link" href="#" style="color:gray;">
                            <p style="margin-bottom: 0;">Share to </p>
                        </div>
                        <a class="nav-link share-to-fb facebook-icon" href="#" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share on Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="nav-link share-to-tw twitter-icon" href="#" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" title="Share on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="{{url('/')}}">
                <p class="m-headline headline-spot racing-green color-green headline-font" style="margin-left:0;">RGM</p>
            </a>
            <div class="d-flex align-items-center">
                <div class="d-lg-none sub-fav-bar">
                    @guest
                        <a href="{{ route('register') }}" class="subscribe-button">
                            Subscribe
                            <i class="fa fa-rss"></i>
                        </a>
                    @else
                        <a href="{{ url('/favourites') }}" class="btn fav-button">
                            Favourites
                            <i class="fa fa-heart"></i>
                        </a>
                    @endguest
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border:none;">
                    <span class="mobile-bars fa fa-bars black-bars"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center mobile-overlay">
                    @foreach($categoryList as $item)
                        <div class="link-hover" id="{{$item->slug}}" data-src="{{asset($item->image)}}">
                            <a href="{{url('/article/'.$item->slug)}}">
                                <p class="link-hover-font">{{$item->name}}</p>
                            </a>
                        </div>
                    @endforeach
                    <hr>
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
                            </br>
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
<div id="menu-overlay" class="overlay-hide">
    <div class="overlay-layout">
        <div style="padding-top: 15vh;">
            @foreach($categoryList as $item)
                <div class="link-hover" id="{{$item->slug}}" data-src="{{asset($item->image)}}">
                    <a href="{{url('/article/'.$item->slug)}}">
                        <p class="link-hover-font">{{$item->name}}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
        <div>
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
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                </br>
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




