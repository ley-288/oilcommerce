<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$appSetting->website_name ?? 'Oil'}}</h4>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="mb-2"><a href="{{url('/')}}" relatedProductItem>Home</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>About Us</a></div>
                    <div class="mb-2"><a href="{{url('/contact-us')}}" relatedProductItem>Contact Us</a></div>
                    {{--
                    <div class="mb-2"><a href="{{url('/blogs')}}" relatedProductItem>Blogs</a></div>
                    <div class="mb-2"><a href="" relatedProductItem>Sitemaps</a></div>
                    --}}
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="mb-2"><a href="{{url('/collections')}}" relatedProductItem>Collections</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" relatedProductItem>Trending Products</a></div>
                    <div class="mb-2"><a href="{{url('/new-arrivals')}}" relatedProductItem>New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{url('/featured-products')}}" relatedProductItem>Featured Products</a></div>
                    <div class="mb-2"><a href="{{url('/cart')}}" relatedProductItem>Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$appSetting->address ?? 'address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" relatedProductItem>
                            <i class="fa fa-phone"></i> {{$appSetting->phone1 ?? 'phone'}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" relatedProductItem>
                            <i class="fa fa-envelope"></i> {{$appSetting->email1 ?? 'email'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - {{$appSetting->website_name ?? 'Oil'}} All rights reserved.</p>
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
</div>
