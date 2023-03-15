<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading racing-green">Racing Green Magazine</h4>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="mb-2"><a href="{{url('/')}}" relatedProductItem>Home</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>About Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contact Us</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" relatedProductItem>Contribute</a></div>
                    <div class="mb-2"><a href="{{url('/brand-directory')}}" relatedProductItem>Directory</a></div>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/article')}}" relatedProductItem><h4 class="footer-heading">Articles</h4></a>
                    <div class="mb-2"><a href="{{url('/latest')}}" relatedProductItem>Latest Articles</a></div>
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
