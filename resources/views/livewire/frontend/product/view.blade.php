<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-1 mb-5">
                    <div class="product-view">
                        <a href="{{url('/article/'.$product->category->name)}}"><p class="product-path">
                            {{$product->category->name}}
                        </p></a>
                        <h3 class="product-name">
                            {{$product->title}}
                        </h3>
                        <h4 class="product-headline">
                            {{$product->headline}}
                        </h4>
                        <div class="mt-2">
                            <button type="button" wire:click="addToWishList({{$product->id}})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishList">
                                    <i class="fa fa-heart"></i> Favourite
                                </span>
                                <span wire:loading wire:target="addToWishList">
                                    Adding...
                                </span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <p class="article-dated">
                                Updated {{ date_format($product->created_at,'d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @if(!empty($product->productImages[0]))
                <div class="mt-1">
                    <div wire:ignore>
                        <div class="hero-image-caption" style="background-image:url({{asset($product->productImages[0]->image)}});">
                            <div class="caption-credit">
                                <p class="hero-img-caption">{{$product->productImages[0]->image_caption}}.</p>
                                <p class="hero-img-credit">{{$product->productImages[0]->image_credit}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="article-paragraph first-word-uppercase">
                    {!! $product->summary !!}
                    <p class="article-dated">
                        Added by {{$product->author}}
                    </p>
                </div>
                @if(!empty($product->productParagraphs[0]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[0]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[0]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[1]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[1]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[1]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[1]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[1]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[1]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[1]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[2]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[2]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[2]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[2]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[2]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[2]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[2]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[3]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[3]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[3]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[3]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[3]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[3]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[3]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[4]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[4]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[4]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[4]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[4]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[4]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[4]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[5]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[5]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[5]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[5]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[5]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[5]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[5]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[6]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[6]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[6]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[6]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[6]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[6]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[6]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[7]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[7]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[7]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[7]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[7]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[7]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[7]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[8]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[8]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[8]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[8]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[8]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[8]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[8]->content}}</p>
                    </div>
                @endif
                @if(!empty($product->productImages[9]))
                    <div class="col-md-5 mt-1">
                        <div class="bg-white" wire:ignore>
                            <div class="image-caption">
                                <img class="lower-image" src="{{asset($product->productImages[9]->image)}}"/>
                                <div class="caption-credit">
                                    <p class="img-caption">{{$product->productImages[9]->image_caption}}. </p>
                                    <p class="img-credit">{{$product->productImages[9]->image_credit}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($product->productParagraphs[9]))
                    <div class="article-paragraph">
                        <p class="mb-0 article-sub">{{$product->productParagraphs[9]->subheader}}</p>
                        <p class="mb-0 article-con">{{$product->productParagraphs[9]->content}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    @if($category)
                        @foreach($category->relatedProducts as $relatedProductItem)
                            <div>
                                @if($relatedProductItem->productImages->count() > 0)
                                    <a href="{{url('/article/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                        <div class="mt-1">
                                            <div wire:ignore>
                                                <div class="related-hero-image-caption" style="background-image:url({{asset($relatedProductItem->productImages[0]->image)}});">
                                                    <div class="product-card-body">
                                                        <h5>
                                                            <a href="{{url('/article/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}" style="color:white;">
                                                            @if($category)<p class="hero-category">{{$category->name}}</p>@endif
                                                                </br>
                                                                <p class="hero-headline">{{$relatedProductItem->headline}}</p>
                                                            </a>
                                                        </h5>
                                                        <p class="hero-summary">{{$relatedProductItem->summary}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        <div>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="p-2">
                            <h4 class="mb-4">No Related Articles</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h6>Related Articles by @if($product) {{$product->brand}} @endif
                    </h6>
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
                                                    <a href="{{url('/article/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                        <img src="{{asset($relatedProductItem->productImages[0]->image)}}" alt="{{$relatedProductItem->name}}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <h5 class="product-name">
                                                    <a href="{{url('/article/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug)}}">
                                                        {{$relatedProductItem->headline}}
                                                    </a>
                                                </h5>
                                                <p class="product-brand">{{$relatedProductItem->summary}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="p-2">
                                <h4 class="mb-4">No Related Articles</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}
</div>

@push('scripts')
<script>
/*
$('.four-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
*/
const hero = document.querySelector('.hero-image-caption');
const articleTitle = document.querySelector('.product-name');
var url = hero.style.backgroundImage;
var addedTtile = articleTitle.innerHTML.trim();

window.onload = function() {

    // Change Meta
    $('meta[property=og\\:image]').attr('content', url);
    $('meta[property=twitter\\:image]').attr('content', url);

    const shareimg = document.querySelector('#share-image');
    const sharetitle = document.querySelector('.share-title');
    const shareFb = document.querySelector('.share-to-fb');
    const shareTw = document.querySelector('.share-to-tw');

    shareimg.style.backgroundImage = url;
    sharetitle.innerHTML = "<div style='display:flex;align-items:center;'><p class='share-header'>You are reading.. </p><p style='margin-bottom:0;margin-left:3px;'> "+addedTtile+"</p></div>";

    shareFb.setAttribute("href", "https://www.facebook.com/sharer/sharer.php?u="+window.location.href+"&t="+addedTtile+"");
    shareTw.setAttribute("href", "https://twitter.com/share?url="+window.location.href+"&via=racinggreenmagazine&text="+addedTtile+"");
};

$(window).on("scroll", () => {
    const navscr = document.querySelector('.main-navbar');
    $(hero).each(function() {
        var offset = $(this).offset().top - $(window).scrollTop();
        if (offset <= 0) {
            $(navscr).scrollTop($(navscr)[0].scrollHeight);
        } else {
            $(navscr).scrollTop(0);
        }
    })
}).trigger("scroll");
</script>
@endpush
