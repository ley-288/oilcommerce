@extends('layouts.app')
@section('title', 'Racing Green Magazine')
@section('content')
@section('title')
    Racing Green Magazine
@endsection
@section('meta_keyword')
    Heritage cars, motorcycles, drivers and constructors
@endsection
@section('meta_description')
    Vintage Motor Racing and Lifestyle Magazine
@endsection
@if(session('message'))
    <h2 class="alert alert-light">{!! session('message') !!}</h2>
@endif

<div id="carouselExampleCaptions" class="carousel slide caro-hero">
    <div class="carousel-inner caro-hero">
        @foreach($featuredHead as $key => $productItem)
            <div class="carousel-item caro-hero {{$key == 0 ? 'active' : ''}}">
                @if($productItem->productImages->count() > 0)
                    <img src="{{asset($productItem->productImages[0]->image)}}" class="d-block caro-hero filtered-image" alt="{{$productItem->name}}">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{$productItem->title}}
                        </h1>
                        <h3>
                            {{$productItem->headline}}
                        </h3>
                        <div>
                            <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="btn btn-slider">
                                Read Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4 class="headline-spot racing-green color-green headline-font">RacingGreenMagazine</h4>
                <div class="underline mx-auto"></div>
                <p class="text-muted">Vintage Motor Racing Magazine</p>
                <p class="text-muted">Find photos and articles that peek your interest in motorsports</p>
            </div>
            <div class="p-3 mobile-nav-lower d-flex justify-content-between align-items-center" style="color:black;">
                <h5 class="m-0">Follow <strong class="racing-green">RGM</strong></h5>
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
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            @forelse($categoryList as $categoryItem)
                <div class="col-12 col-md-3">
                    <a href="{{url('/article/'.$categoryItem->slug)}}">
                        <div class="category-card" style="background-image:url({{asset($categoryItem->image)}});">
                            <div class="categroy-card-overlay">
                                <p class="cat-overlay-font">{{$categoryItem->name}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12">
                    <h5>No Categories</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row col-md-8 border-right">
            <div class="col-md-8">
                <h4 class="mb-0 article-sub">Featured Articles</h4>
                <div class="underline mb-4"></div>
            </div>
            @if($featuredProducts)
                @foreach($featuredProducts as $productItem)
                    <div class="col-md-8">
                        <div class="search-card">
                            <div class="search-card-img">
                                @if($productItem->productImages->count() > 0)
                                    <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="search-card-body">
                                <div class="">
                                    <h5 class="mb-0 article-sub">
                                        <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                            {{ Str::limit($productItem->title, 30, '...') }}
                                        </a>
                                    </h5>
                                    <p class="mb-0 article-con">{{$productItem->headline}}</p>
                                    @if(!empty($productItem->productParagraphs[0]))
                                        <p class="mb-0 article-con">
                                            {{ Str::limit($productItem->productParagraphs[0]->content, 50, '...') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-8">
                    <div class="p-2">
                        <h4 class="mb-4">No Article Available</h4>
                    </div>
                </div>
            @endif
            <div class="col-md-8 col-md-8 d-flex justify-content-center">
                <a href="{{url('/featured')}}" class="btn btn-dark">Read More Featured</a>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row col-md-8 border-right">
            <div class="col-md-8">
                <h4 class="mb-0 article-sub">Latest Articles</h4>
                <div class="underline mb-4"></div>
            </div>
            @if($newArrivalProducts)
                @foreach($newArrivalProducts as $productItem)
                    <div class="col-md-8">
                        <div class="search-card">
                            <div class="search-card-img">
                                @if($productItem->productImages->count() > 0)
                                    <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="search-card-body">
                                <div class="">
                                    <h5 class="mb-0 article-sub">
                                        <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                            {{$productItem->title}}
                                        </a>
                                    </h5>
                                    <p class="mb-0 article-con">{{$productItem->headline}}</p>
                                    @if(!empty($productItem->productParagraphs[0]))
                                        <p class="mb-0 article-con">
                                            {{ Str::limit($productItem->productParagraphs[0]->content, 50, '...') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-8">
                    <div class="p-2">
                        <h4 class="mb-4">No Article Available</h4>
                    </div>
                </div>
            @endif
            <div class="col-md-8 col-md-8 d-flex justify-content-center">
                <a href="{{url('/latest')}}" class="btn btn-dark">Read More Latest</a>
            </div>
        </div>
    </div>
</div>
<div class="py-5 archive-background">
    <div class="container">
        <div class="row col-md-12 border-right">
            <div class="col-md-12">
                <h4 class="mb-0 article-sub">Archived Articles</h4>
                <div class="underline mb-4"></div>
            </div>
            @if($archiveProducts)
                @foreach($archiveProducts as $productItem)
                    <div class="col-md-6">
                        <div class="search-card">
                            <div class="search-card-img">
                                @if($productItem->productImages->count() > 0)
                                    <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                        <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                    </a>
                                @endif
                            </div>
                            <div class="search-card-body">
                                <div class="">
                                    <h5 class="mb-0 article-sub">
                                        <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                            {{$productItem->title}}
                                        </a>
                                    </h5>
                                    <p class="mb-0 article-con">{{$productItem->headline}}</p>
                                    @if(!empty($productItem->productParagraphs[0]))
                                        <p class="mb-0 article-con">
                                            {{ Str::limit($productItem->productParagraphs[0]->content, 50, '...') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4 class="mb-4">No Article Available</h4>
                    </div>
                </div>
            @endif
            <div class="col-md-12 col-md-12 d-flex justify-content-center">
                <a href="{{url('/latest')}}" class="btn btn-light" style="color:black;">View More</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    /*
    $(document).ready(function(){
        //setTimeout(function(){
            const loadingOverlay = document.querySelector('.loading-overlay');
            loadingOverlay.classList.toggle('hide-loading-overlay');
        //}, 1000);
    });
    */
</script>
@endsection
