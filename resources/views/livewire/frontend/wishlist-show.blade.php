<div>
    <div class="py-3 py-md-5">
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
                                                            {{$wishlistItem->product->title}}
                                                        </h3>
                                                        <h4 class="favorite-headline">
                                                            {{$wishlistItem->product->headline}}
                                                        </h4>
                                                    </a>
                                                        <div>
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
                            <h4>No items in Wishlist</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
