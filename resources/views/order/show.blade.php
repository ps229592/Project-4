@extends('layouts.dashboard')

@section('title')
    Order: {{ $order->created_at }}
@endsection

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        <div class="text-xl font-bold">Order Details</div>
        <div class="py-5">
            <div>Name: {{ $order->user->name }}</div>
            <div>Ordered at: {{ $order->created_at }}</div>
            <div>Status: {{ $order->status->name }}</div>
        </div>
        <div class="text-xl font-bold">Order Items</div>
        <div class="grid grid-cols-5 py-5">
            <div class="font-bold">Name</div>
            <div class="font-bold">Price</div>
            <div class="font-bold">Size</div>
            <div class="font-bold">Quantity</div>
            <div class="font-bold">Subtotal</div>
            <?php $total = 0; ?>
            @foreach ($orderitems as $item)
                <?php $subtotal = $item->price * $item->quantity;
                $total += $subtotal; ?>
                <div>{{ $item->product->name }}</div>
                <div>€ {{ number_format($item->price, 2) }}</div>
                <div>{{ $item->size }} cm</div>
                <div>{{ $item->quantity }}</div>
                <div>€ {{ number_format($subtotal, 2) }}</div>
            @endforeach
        </div>
        <div>Total: € {{ number_format($total, 2) }}</div>
    </div>
@endsection
