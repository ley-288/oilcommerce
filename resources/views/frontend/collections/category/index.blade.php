@extends('layouts.app')
@section('title', 'All Categories')
@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            @forelse($categories as $categoryItem)
                <div class="col-6 col-md-3">
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

@endsection
