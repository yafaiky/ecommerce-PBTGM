@extends('seller.layout')

@section('content')
<div class="section-header flex justify-between items-center">
    <div>
        <h1 class="welcome-text">Kelola Produk</h1>
        <p class="welcome-sub">Tambahkan, ubah, atau hapus produk Anda.</p>
    </div>
    <a href="{{ route('seller.products.create') }}" class="btn-primary" style="text-decoration:none;">+ Tambah Produk</a>
</div>

<div class="overflow-x-auto mt-6">
    <table class="w-full text-left border-collapse border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm border-b">Produk</th>
                <th class="py-3 px-4 font-semibold text-sm border-b">Kategori</th>
                <th class="py-3 px-4 font-semibold text-sm border-b">Harga</th>
                <th class="py-3 px-4 font-semibold text-sm border-b">Stok</th>
                <th class="py-3 px-4 font-semibold text-sm border-b text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <td class="py-3 px-4 flex items-center gap-3">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 object-cover rounded">
                    @else
                        <div class="w-12 h-12 bg-gray-200 flex items-center justify-center text-xs text-gray-500 rounded">No Img</div>
                    @endif
                    <div>
                        <div class="font-medium text-sm">{{ $product->name }}</div>
                        <div class="text-xs text-gray-500">{{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</div>
                    </div>
                </td>
                <td class="py-3 px-4 text-sm">{{ $product->category->name ?? '-' }}</td>
                <td class="py-3 px-4 text-sm">{{ str_replace('Rp ', 'Rp', $product->formatted_price) }}</td>
                <td class="py-3 px-4 text-sm">{{ $product->stock }}</td>
                <td class="py-3 px-4 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('seller.products.edit', $product->id) }}" class="text-blue-600 hover:underline text-xs uppercase">Edit</a>
                        <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-xs uppercase bg-transparent border-none cursor-pointer">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Belum ada produk yang ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
