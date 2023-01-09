@extends('layouts.app')
@section('title', 'My Orders')
@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="p-3 shadow bg-white">
                    <h4 class="mb-4">My Orders</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Tracking No.</th>
                                    <th>Username</th>
                                    <th>Payment Method</th>
                                    <th>Order Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $orderItem)
                                    <tr>
                                        <td>{{$orderItem->id}}</td>
                                        <td>{{$orderItem->tracking_no}}</td>
                                        <td>{{$orderItem->fullname}}</td>
                                        <td>{{$orderItem->payment_mode}}</td>
                                        <td>{{$orderItem->created_at->format('d-m-y')}}</td>
                                        <td>{{$orderItem->status}}</td>
                                        <td><a href="{{url('orders/'.$orderItem->id)}}" class="btn btn-primary btn-sm text-white">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            No orders yet
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
