@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <h5 class="alert alert-success mb-2">{{session('message')}}</h5>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="{{url('admin/products/')}}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag" data-bs-toggle="tab" data-bs-target="#seotag-pane" type="button" role="tab" aria-controls="seotag-pane" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details" data-bs-toggle="tab" data-bs-target="#details-pane" type="button" role="tab" aria-controls="details-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="images" data-bs-toggle="tab" data-bs-target="#images-pane" type="button" role="tab" aria-controls="images-pane" aria-selected="false">Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors" data-bs-toggle="tab" data-bs-target="#colors-pane" type="button" role="tab">Color</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" value="{{$product->slug}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Brand</label>
                                <select name="brand" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected' : ''}}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Small Description</label>
                                <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-pane" role="tabpanel" aria-labelledby="seotag" tabindex="0">
                            <div class="mb-3">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-pane" role="tabpanel" aria-labelledby="details" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="{{$product->selling_price}}"  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured" {{ $product->featured == '1' ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="images-pane" role="tabpanel" aria-labelledby="images" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Images</label>
                                <input type="file" name="image[]" multiple class="form-control"/>
                            </div>
                            <div>
                                @if($product->productImages)
                                    <div class="row">
                                        @foreach($product->productImages as $image)
                                            <div class="col-md-2">
                                                <img src="{{asset($image->image)}}" style="height:80px; width:80px;"    class="me-4    border" alt="Img" />
                                                <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    No Images Added
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="colors-pane" role="tabpanel"  tabindex="0">
                            <div class="mb-3">
                                <h3>Add Color</h3>
                                <label>Color</label>
                                <div class="row">
                                    @forelse($colors as $coloritem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color: <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}"/>
                                                {{$coloritem->name}}
                                                </br>
                                                Quantity: <input type="number" name="colorquantity[{{$coloritem->id}}]" style="width:70px; border:1px solid;">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h3>No Colors Found</h3>
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->productColors as $prodColor)
                                            <tr class="prod-color-tr">
                                                <td>
                                                    @if($prodColor->color)
                                                        {{$prodColor->color->name}}
                                                    @else
                                                        No Color
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3" style="width:150px;">
                                                        <input type="text" value="{{$prodColor->quantity}}" class="productColorQuantity form-control form-control-sm">
                                                        <button type="button" value="{{$prodColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{$prodColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.updateProductColorBtn', function(){
            var product_id = "{{$product->id}}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            if(qty <= 0){
                alert('Quantity is required');
                return false;
            }
            var data = {
                'product_id' : product_id,
                'qty' : qty,
            };
            $.ajax({
                type: 'POST',
                url: '/admin/product-color/'+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message);
                }
            });
        });
        $(document).on('click', '.deleteProductColorBtn', function(){
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: 'GET',
                url: '/admin/product-color/'+prod_color_id+'/delete',
                success: function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });
        });
    });
</script>
@endpush
