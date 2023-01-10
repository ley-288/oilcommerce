<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\InvoiceOrderMailable;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //$todaysDate = Carbon::now();
        //$orders = Order::whereDate('created_at', $todaysDate)->paginate(10);

        $todaysDate = Carbon::now()->format('y-m-d');
        $orders = Order::when($request->date != null, function($q) use ($request){
                    return $q->whereDate('created_at', $request->date);
                }, function($q) use ($todaysDate){
                    $q->whereDate('created_at', $todaysDate);
                })
                ->when($request->status != null, function($q) use ($request){
                    return $q->where('status', $request->status);
                })
                ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){
            return view('admin.orders.view', compact('order'));
        }else{
            return redirect('admin/orders')->with('message', 'Order item not found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order){
            $order->update([
                'status' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order status updated');
        }else{
            return redirect('admin/orders/'.$orderId)->with('message', 'Order item not found');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todaysDate = Carbon::now()->format('d-m-y');
        return $pdf->download('invoice-'.$order->id.'-'.$todaysDate.'.pdf');
    }

    public function mailInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        try{
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message', 'Invoice mail sent to '.$order->email);
        }
        catch(\Exception $e){
            return redirect('admin/orders/'.$orderId)->with('message', 'Something went wrong!');
        }
    }
}
