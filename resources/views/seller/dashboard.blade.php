@extends('seller.layout')

@section('content')
<div class="section-header">
    <h1 class="welcome-text">Seller Dashboard</h1>
    <p class="welcome-sub">Ringkasan performa dan manajemen toko Anda.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
    <div class="border border-gray-200 p-6 text-center">
        <div class="text-4xl font-serif text-[#033b2a] mb-2">{{ $productsCount }}</div>
        <div class="text-xs uppercase tracking-wider text-gray-500">Total Produk</div>
    </div>
    <div class="border border-gray-200 p-6 text-center">
        <div class="text-4xl font-serif text-[#033b2a] mb-2">{{ $ordersCount }}</div>
        <div class="text-xs uppercase tracking-wider text-gray-500">Total Pesanan Masuk</div>
    </div>
</div>

<div class="mb-10">
    <div class="flex justify-between items-end border-b border-gray-200 pb-3 mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Pesanan Terbaru</h2>
        <a href="{{ route('seller.orders.index') }}" class="text-xs uppercase tracking-wider text-gray-500 underline">Lihat Semua</a>
    </div>

    @if($recentOrders->isEmpty())
        <div class="py-12 text-center text-gray-500 text-sm border border-dashed border-gray-200">
            Belum ada pesanan yang masuk.<br><br>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="py-3 font-semibold text-sm">Order #</th>
                        <th class="py-3 font-semibold text-sm">Tanggal</th>
                        <th class="py-3 font-semibold text-sm">Pelanggan</th>
                        <th class="py-3 font-semibold text-sm text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 font-mono text-sm">#{{ $order->order_number }}</td>
                        <td class="py-3 text-sm text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="py-3 text-sm">{{ $order->user->name }}</td>
                        <td class="py-3 text-center">
                            @php
                                $statusLabel = match($order->status) {
                                    'pending' => 'Menunggu',
                                    'processing' => 'Dikemas',
                                    'shipped' => 'Dikirim',
                                    'delivered' => 'Diterima',
                                    'cancelled' => 'Dibatalkan',
                                    default => ucfirst($order->status)
                                };
                            @endphp
                            <span class="text-xs uppercase tracking-wider font-semibold {{ $order->status == 'delivered' ? 'text-green-600' : 'text-gray-600' }}">
                                {{ $statusLabel }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
