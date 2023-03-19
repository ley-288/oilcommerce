@extends('layouts.app')
@section('title', 'Wishlist')
@section('content')

@push('styles')
<style>
    .hidable-div{
        display:none;
    }
</style>
@endpush

<div>
    <livewire:frontend.wishlist-show />
</div>

@endsection
