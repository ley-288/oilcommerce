@extends('layouts.app')
@section('title', 'Latest')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            @forelse($newArrivalProducts as $productItem)
                <div class="col-md-12">
                    <div class="search-card">
                        <div class="search-card-img">
                            @if($productItem->productImages->count() > 0)
                                <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                </a>
                            @endif
                        </div>
                        <div class="search-card-body">
                            <h5 class="product-name">
                                <a href="{{url('/article/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    {{$productItem->title}}
                                </a>
                            </h5>
                            <p class="product-brand">{{$productItem->headline}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 p-2">
                    <h4 class="mb-4">No Article Available</h4>
                </div>
            @endforelse
            <div class="text-center">
                <a href="{{url('/article')}}" class="btn btn-warning px-3"> View More</a>
            </div>
        </div>
    </div>
</div>


@endsection
