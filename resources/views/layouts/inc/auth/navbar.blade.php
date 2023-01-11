<div class="main-navbar sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <a class="navbar-brand brand-logo" href="{{url('/')}}">
                        <img src="{{asset('admin/images/head-logo.png?v=1.1')}}" alt="logo" width="350" style="height:auto;"/>
                    </a>
                </div>
                <div class="col-md-6 my-auto">
                    <ul class="nav justify-content-end">
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                <img src="{{asset('admin/images/branches-blk.png?v=1.1')}}" alt="logo" style="width:50px;height:auto;"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center ">
                </ul>
            </div>
        </div>
    </nav>
</div>
