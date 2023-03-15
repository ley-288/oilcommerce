@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Articles
                    <a href="{{url('admin/articles/create')}}" class="btn btn-primary btn-sm text-white float-end">
                        Add Article
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->category)
                                        {{$product->category->name}}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->summary}}</td>
                                <td>{{$product->status == '1' ? 'Unpublished' : 'Published'}}</td>
                                <td>
                                    <a href="{{ url('admin/articles/'.$product->id.'/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>
                                    <a href="{{ url('admin/articles/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger text-white">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Articles Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
