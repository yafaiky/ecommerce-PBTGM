@extends('seller.layout')

@section('content')
<div class="section-header">
    <h1 class="welcome-text">Kelola Pesanan</h1>
    <p class="welcome-sub">Perbarui status pengiriman untuk pesanan pelanggan Anda.</p>
</div>

<div class="overflow-x-auto mt-6">
    <table class="w-full text-left border-collapse border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm border-b">Order #</th>
                <th class="py-3 px-4 font-semibold text-sm border-b">Tanggal</th>
                <th class="py-3 px-4 font-semibold text-sm border-b">Pelanggan</th>
                <th class="py-3 px-4 font-semibold text-sm border-b text-center">Status</th>
                <th class="py-3 px-4 font-semibold text-sm border-b text-center">Ubah Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <td class="py-3 px-4 font-mono text-sm">#{{ $order->order_number }}</td>
                <td class="py-3 px-4 text-sm">{{ $order->created_at->format('d M Y, H:i') }}</td>
                <td class="py-3 px-4 text-sm">{{ $order->user->name }}</td>
                <td class="py-3 px-4 text-center">
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
                <td class="py-3 px-4 text-center">
                    <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="flex gap-2 items-center justify-center">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="border border-gray-300 text-xs px-2 py-1" onchange="this.form.submit()">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Dikemas</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Diterima</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Belum ada pesanan yang masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
