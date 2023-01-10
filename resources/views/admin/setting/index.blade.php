@extends('layouts.admin')
@section('title', 'Settings')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <form action="{{url('/admin/settings')}}" method="POST">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" value="{{$settings->website_name ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{$settings->website_url ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Page Title</label>
                            <input type="text" name="page_title" value="{{$settings->page_title ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{$settings->meta_keyword ?? ''}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{$settings->meta_description ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3">{{$settings->address ?? ''}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1</label>
                            <input type="text" name="phone1" value="{{$settings->phone1 ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 2</label>
                            <input type="text" name="phone2" value="{{$settings->phone2 ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="text" name="email1" value="{{$settings->email1 ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="text" name="email2" value="{{$settings->email2 ?? ''}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Social Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="{{$settings->facebook ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter</label>
                            <input type="text" name="twitter" value="{{$settings->twitter ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="{{$settings->instagram ?? ''}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="{{$settings->youtube ?? ''}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
