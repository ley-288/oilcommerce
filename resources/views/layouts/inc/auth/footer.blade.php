<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading racing-green">Racing Green Magazine</h4>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/article')}}" relatedProductItem><h4 class="footer-heading">Articles</h4></a>
                    <div class="mb-2"><a href="{{url('/latest')}}" relatedProductItem>Latest Articles</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="mb-2"><a href="{{url('/')}}" relatedProductItem>Home</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>About Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contact Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contribute</a></div>
                    {{--<div class="mb-2"><a href="{{url('/brand-directory')}}" relatedProductItem>Directory</a></div>--}}
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
