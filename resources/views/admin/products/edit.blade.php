@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <h5 class="alert alert-success mb-2">{{session('message')}}</h5>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Article
                    <a href="{{url('admin/articles/')}}" class="btn btn-primary btn-sm text-white float-end">
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
                <form action="{{url('admin/articles/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="content" data-bs-toggle="tab" data-bs-target="#content-pane" type="button" role="tab">Content</button>
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
                                <label>Headline</label>
                                <input type="text" name="headline" value="{{$product->headline}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$product->title}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Author</label>
                                <input type="text" name="author" value="{{$product->author}}" class="form-control"/>
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
                                <label>Summary</label>
                                <textarea name="summary" class="form-control" rows="4">{{$product->summary}}</textarea>
                            </div>
                            {{--
                            <div class="mb-3">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="4">{{$product->content}}</textarea>
                            </div>
                            --}}
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
                                {{--
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
                                --}}
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
                                                <img src="{{asset($image->image)}}" style="height:80px; width:80px;"    class="me-4 border" alt="Img" />
                                                <a href="{{url('admin/article-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                                <div class="mb-3">
                                                    <label>Caption</label>
                                                    <input type="text" name="image_caption" value="{{$image->image_caption}}" class="form-control"/>
                                                    <label>Credit</label>
                                                    <input type="text" name="image_credit" value="{{$image->image_credit}}" class="form-control"/>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    No Images Added
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="content-pane" role="tabpanel" tabindex="0">
                            <div class="mb-3">
                                <h3>Add Paragraphs</h3>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Paragraph</th>

                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->productParagraphs as $productPara)
                                            <tr class="prod-color-tr">
                                                <td>
                                                    <div class="input-group mb-3">
                                                        @if($productPara)
                                                            <textarea class="productParaHeader form-control" rows="4">{{$productPara->subheader}}</textarea>
                                                            <textarea class="productParaContent form-control" rows="4">{{$productPara->content}}</textarea>
                                                        @else
                                                            No Paragraph
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group mb-1">
                                                        <button type="button" value="{{$productPara->id}}" class="updateProductParaContentBtn btn btn-primary btn-sm text-white">Update</button>
                                                    </div>
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
        $(document).on('click', '.updateProductParaContentBtn', function(){
            var product_id = "{{$product->id}}";
            var art_para_id = $(this).val();
            var subheader = $(this).closest('.prod-color-tr').find('.productParaHeader').val();
            var content = $(this).closest('.prod-color-tr').find('.productParaContent').val();
            /*
            if(header <= 0){
                alert('Quantity is required');
                return false;
            }
            */
            var data = {
                'product_id' : product_id,
                'subheader' : subheader,
                'content' : content,
            };
            $.ajax({
                type: 'POST',
                url: '/admin/article-paragraph/'+art_para_id,
                data: data,
                success: function(response){
                    alert(response.message);
                }
            });
        });
    });
</script>
@endpush
