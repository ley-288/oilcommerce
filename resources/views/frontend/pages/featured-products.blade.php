@extends('layouts.app')
@section('title', 'Featured')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row col-md-8 border-right">
            <div class="">
                <h4>Featured</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse($featuredProducts as $productItem)
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
            @empty
                <div class="col-md-8 p-2">
                    <h4 class="mb-4">No Article Available</h4>
                </div>
            @endforelse
            <div class="text-center">
                <a href="{{url('/article')}}" class="btn btn-dark px-3"> View More</a>
            </div>
        </div>
    </div>
</div>


@endsection
