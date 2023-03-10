<div>
    <div class="row">
        <div class="col-md-10" style="border-right: 1px solid lightgray;">
            <div class="row">
                @forelse($products as $productItem)
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
                    <div class="col-md-12">
                        <div class="">
                            <h4 class="mb-4">No Article Available in {{$category->name}}</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
