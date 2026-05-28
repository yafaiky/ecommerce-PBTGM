@extends('seller.layout')

@section('content')
<div class="mb-6">
    <a href="{{ route('seller.products.index') }}" class="text-xs uppercase tracking-wider text-gray-500 hover:text-gray-900">&larr; Kembali ke Produk</a>
</div>

<div class="section-header">
    <h1 class="welcome-text">Edit Produk</h1>
</div>

@if ($errors->any())
    <div class="bg-red-50 text-red-700 p-4 mb-6 rounded text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">Nama Produk <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
    </div>
    
    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">Kategori <span class="text-red-500">*</span></label>
        <select name="category_id" required class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
            <option value="">Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-semibold mb-2">Harga Jual (Rp) <span class="text-red-500">*</span></label>
            <input type="number" name="price" value="{{ old('price', (int)$product->price) }}" required min="0" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-2">Harga Coret / Asli (Rp)</label>
            <input type="number" name="original_price" value="{{ old('original_price', (int)$product->original_price) }}" min="0" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-semibold mb-2">Ukuran (Opsional)</label>
            <input type="text" name="sizes" value="{{ old('sizes', is_array($product->sizes) ? implode(', ', $product->sizes) : '') }}" placeholder="Contoh: S, M, L, XL" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
            <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma.</p>
        </div>
        <div>
            <label class="block text-sm font-semibold mb-2">Warna (Opsional)</label>
            <input type="text" name="colors" value="{{ old('colors', is_array($product->colors) ? implode(', ', $product->colors) : '') }}" placeholder="Contoh: Hitam, Putih, Navy" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
            <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma.</p>
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">Stok <span class="text-red-500">*</span></label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required min="0" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">Gambar Produk (Kosongkan jika tidak diubah)</label>
        @if($product->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $product->image) }}" class="w-24 h-24 object-cover border border-gray-200">
            </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">
    </div>

    <div class="mb-6">
        <label class="block text-sm font-semibold mb-2">Deskripsi Produk</label>
        <textarea name="description" rows="5" class="w-full border border-gray-300 px-3 py-2 focus:outline-none focus:border-[#033b2a]">{{ old('description', $product->description) }}</textarea>
    </div>

    <button type="submit" class="btn-primary w-full py-3 font-semibold tracking-wider">PERBARUI PRODUK</button>
</form>
@endsection
