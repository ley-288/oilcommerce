<div class="search-overlay overlay-hide">
    <div class="col-md-12">
        <form action="{{url('search')}}" method="get" role="search">
            <div class="search-padding d-flex flex-column text-center">
                <div class="text-white">
                    <p>Search <strong class="racing-green" style="font-size: 1.2rem;">Racing Green</strong> Articles</p>
                </div>
                </br></br>
                <div class="input-group">
                    <input type="search" name="search" value="{{Request::get('search')}}" placeholder="Search.." class="form-control search-bar" />
                    <button class="btn bg-white search-button" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                </br></br>
                <div class="mt-5 text-white">
                    <div class="close-search-overlay">
                        Close
                        <i class="fa fa-close"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="hidable-div">
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end float-end">
                    <div class="btn search-btn">
                        Search
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/')}}"><h4 class="footer-heading racing-green">RacingGreenMagazine</h4></a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/article')}}" relatedProductItem><h4 class="footer-heading">Articles</h4></a>
                    @foreach($categoryList as $item)
                        <div class="mb-2" id="{{$item->slug}}" data-src="{{asset($item->image)}}">
                            <a href="{{url('/article/'.$item->slug)}}">
                                {{$item->name}}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="mb-2"><a href="{{url('/')}}" relatedProductItem>Home</a></div>
                    <div class="mb-2"><a href="{{url('/profile')}}" relatedProductItem>Profile</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>About Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contact Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contribute</a></div>
                    <div class="mb-2"><a href="{{url('/favourites')}}" relatedProductItem>Favourites</a></div>
                    {{--<div class="mb-2"><a href="{{url('/brand-directory')}}" relatedProductItem>Directory</a></div>--}}
                    <div class="mb-2"><a href="{{url('/latest')}}" relatedProductItem>Latest Articles</a></div>
                    <div class="mb-2"><a href="{{url('/cookie-policy')}}" relatedProductItem>Cookie Policy</a></div>
                    <div class="mb-2"><a href="{{url('/privacy-policy')}}" relatedProductItem>Privacy Policy</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="mb-2">
                        <p style="margin-bottom:0;">
                            {{$appSetting->address ?? 'address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="mailto:racinggreenmagazine@gmail.com" relatedProductItem>
                            {{$appSetting->email1 ?? 'email'}}
                        </a>
                    </div>
                    @guest
                        <ul class="nav flexed-nav">
                            <a class="btn subscribe-button" href="{{ route('register') }}" style="color:black; font-weight:bold;">
                                Subscribe
                                <i class="fa fa-rss"></i>
                            </a>
                        </ul>
                    @endguest
                    @if(Auth::user())
                        @if(Auth::user()->role_as == '1')
                            <div class="mb-2">
                                <a href="{{url('admin/dashboard')}}" relatedProductItem>
                                    Admin
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - {{$appSetting->website_name ?? 'Racing Green'}}. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        @if($appSetting->facebook)
                            <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($appSetting->twitter)
                            <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($appSetting->instagram)
                            <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($appSetting->youtube)
                            <a href="{{$appSetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <a href="https://www.jiant.io" target="_blank" style="display:flex;align-items: baseline;">
                    <p>Powered by </p><p class="jiant" style="margin-left:5px;"> JIANT</p></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    /* Check if the user has not visited yet this website
    (or not accepted the cookies usage) */
    if(!isset($_COOKIE['infoCookies']))
    {
        /* Insert below the link to cookies policy */
        $cookiePolicy = "http://www.racinggreenmagazine.com";
        echo " <div id='cookies' class='cookies'><div><strong class='racing-green'>RacingGreenMagazine</strong> uses cookies to improve your experience.";
        echo " <a class='cookieLinks' target='_blank' style='color:white;' href='$cookiePolicy'>You can read our policy here</a>.";
        echo " By browsing our site you accept our cookies policy.</div>";
        /* if "OK" clicked, call the JS function to hide the popup and set the cookie */
        echo" <div><a onClick='hideCookie();' class='cookieLinks btn btn-light' href=#>Accept</a></div></div>";
    }
?>
