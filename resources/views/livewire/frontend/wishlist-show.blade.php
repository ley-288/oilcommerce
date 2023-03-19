<div class="">{{--scrollbox--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">
                    @forelse($wishlist as $wishlistItem)
                        @if($wishlistItem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-12 my-auto">
                                        <div class="favorite-article-card" style="background-image:url({{$wishlistItem->product->productImages[0]->image}});">
                                            <div class="f-a-c-overlay">
                                                <div>
                                                    <a href="{{ url('article/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}">
                                                        <h3 class="favorite-name">
                                                            {{ Str::limit($wishlistItem->product->title, 100) }}
                                                        </h3>
                                                        <h4 class="favorite-headline">
                                                            {{ Str::limit($wishlistItem->product->headline, 50)}}
                                                        </h4>
                                                    </a>
                                                    </br>
                                                    <div class="">
                                                        <button type="button" wire:click="removeWishlistItem({{$wishlistItem->id}})" class="btn btn-light btn-sm">
                                                            <span wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                                                <i class="fa fa-heart-o"></i> Remove
                                                            </span>
                                                            <span wire:loading wire:target="removeWishlistItem({{$wishlistItem->id}})">
                                                                <i class="fa fa-heart-o"></i> Removing
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="d-flex justify-content-center align-items-center" style="height:60vh;">
                            <div class="d-flex flex-column align-items-center text-center">
                                <i class="fa fa-heart-o empty-fav-icon"></i>
                                <h3>Empty!</h3>
                                <h5 class="text-muted">Click "Favourite" to add Articles here so you can quickly find them again.</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="d-flex justify-content-around">
        @if(!$wishlist->onFirstPage())
            <a href="{{ $wishlist->previousPageUrl()}}" class="btn btn-light px-3"><i class="fa fa-arrow-left"></i></a>
        @endif
        <a href="{{url('/')}}" class="btn btn-dark px-3">Home</a>
        @if(!$wishlist->onLastPage())
            <a href="{{ $wishlist->nextPageUrl() }}" class="btn btn-light px-3"><i class="fa fa-arrow-right"></i></a>
        @endif
    </div>
</div>
