<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-1">
                    <div class="bg-white" wire:ignore>
                        @if($product->productImages)
                            <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->productImages as $itemImg)
                                        <li><img src="{{asset($itemImg->image)}}"/></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="exzoom_nav mt-10"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="fa fa-arrow-left"></i> </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="fa fa-arrow-right"></i> </a>
                            </p>
                            </div>
                        @else
                            No Image
                        @endif
                    </div>
                </div>
                <div class="col-md-5 mt-1">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                        </h4>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                        <label class="colorSelectionLabel" style="background-color:{{$colorItem->color->code}};"
                                        wire:click="colorSelected({{$colorItem->id}})"
                                        >{{$colorItem->color->name}}</label>
                                    @endforeach
                                @endif
                                <div>
                                    @if($this->prodColorSelectedQuantiy == 'outOfStock')
                                        <label class="colorSelectionLabel btn-sm py-1 mt-2">Out of Stock</label>
                                    @elseif($this->prodColorSelectedQuantiy > 0)
                                        <label class="colorSelectionLabel btn-sm py-1 mt-2 btn1">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if($product->quantity)
                                    <label class="colorSelectionLabel btn-sm py-1 mt-2 btn1">In Stock</label>
                                @else
                                    <label class="colorSelectionLabel btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity" style="border-radius:100%;"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" class="input-quantity" readonly style="border-radius:25px"/>
                                <span class="btn btn1" wire:click="incrementQuantity" style="border-radius:100%;"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1" style="    background:#00b3ff;color:#fff;border: 1px solid #00b3ff;">
                                <i class="fa fa-shopping-cart"></i>
                                Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishList({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishList">
                                    Adding...
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <p>
                                {!! $product->small_description !!}
                            </p>
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Related
                        @if($category) {{$category->name}} @endif
                        Products
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @if($category)
                            @foreach($category->relatedProducts as $relatedProductItem)
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if($relatedProductItem->productImages->count() > 0)
                                                <a href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                    <img src="{{asset($relatedProductItem->productImages[0]->image)}}" alt="{{$relatedProductItem->name}}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                            <h5 class="product-name">
                                                <a href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                    {{$relatedProductItem->name}}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{$relatedProductItem->selling_price}}</span>
                                                <span class="original-price">${{$relatedProductItem->original_price}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-2">
                                <h4 class="mb-4">No Related Prodcuts</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Related
                        @if($product) {{$product->brand}} @endif
                        Products
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @if($category)
                            @foreach($category->relatedProducts as $relatedProductItem)
                                @if($relatedProductItem->brand == "$product->brand")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                @if($relatedProductItem->productImages->count() > 0)
                                                    <a href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                        <img src="{{asset($relatedProductItem->productImages[0]->image)}}" alt="{{$relatedProductItem->name}}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{$relatedProductItem->brand}}</p>
                                                <h5 class="product-name">
                                                    <a href="{{url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                        {{$relatedProductItem->name}}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">${{$relatedProductItem->selling_price}}</span>
                                                    <span class="original-price">${{$relatedProductItem->original_price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="p-2">
                                <h4 class="mb-4">No Related Products</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(function(){
    $("#exzoom").exzoom({
        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,
        // autoplay
        "autoPlay": false,
        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000
    });
});
$('.four-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endpush
