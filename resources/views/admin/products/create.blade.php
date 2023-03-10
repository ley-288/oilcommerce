@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Article
                    <a href="{{url('admin/articles')}}" class="btn btn-primary btn-sm text-white float-end">
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
                <form action="{{url('admin/articles')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="content" data-bs-toggle="tab" data-bs-target="#content-pane" type="button" role="tab" aria-controls="content-pane" aria-selected="false">Content</button>
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
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Headline</label>
                                <input type="text" name="headline" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Brand</label>
                                <select name="brand" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}">
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Summary</label>
                                <textarea name="summary" class="form-control" rows="4"></textarea>
                            </div>
                            {{--
                            <div class="mb-3">
                                <label>Article</label>
                                <textarea name="content" class="form-control" rows="4"></textarea>
                            </div>
                            --}}
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-pane" role="tabpanel" aria-labelledby="seotag" tabindex="0">
                            <div class="mb-3">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-pane" role="tabpanel" aria-labelledby="details" tabindex="0">
                            <div class="row">
                                {{--
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control"/>
                                    </div>
                                </div>
                                --}}
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Unpublished</label>
                                        <input type="checkbox" name="status" checked/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="images-pane" role="tabpanel" aria-labelledby="images" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Images</label>
                                <input type="file" name="image[]" multiple class="form-control"/>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="content-pane" role="tabpanel" aria-labelledby="content" tabindex="0">
                            <div class="mb-3">
                                <label>Paragraphs</label>
                                <div class="row">
                                    @forelse($paragraphs as $paragraph)
                                        <div class="">
                                            <div class="p-2 border mb-3">
                                                Add: <input type="checkbox" name="paragraphs[{{$paragraph->id}}]" value="{{$paragraph->id}}"/>
                                                </br>
                                                <div class="mb-3">
                                                    <label>Subheader:</label>
                                                    <textarea name="paragrpahsub[{{$paragraph->id}}" class="form-control" rows="4"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Content:</label>
                                                    <textarea name="paragrpahcon[{{$paragraph->id}}" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h3>No Paragraph Found</h3>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
