@extends('client.layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Ảnh và thông tin sản phẩm -->
    <div class="md:col-span-2 bg-white p-6 rounded shadow">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Hình ảnh -->
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="space-y-4">
                <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                <p class="text-xl text-red-600 font-semibold">{{ number_format($product->price) }} VNĐ</p>
                <p class="text-sm text-gray-600">Lượt xem: {{ $product->view }}</p>
                <div>
                    <h2 class="font-semibold mb-2">Mô tả sản phẩm</h2>
                    <p class="text-sm text-gray-700">{{ $product->description }}</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>

    <!-- Sidebar danh mục / lọc giá -->

</div>

<!-- Sản phẩm liên quan -->
<div class="mt-12">
    <h2 class="text-xl font-semibold mb-4">Sản phẩm liên quan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @forelse ($relatedProducts as $item)
            <a href="{{ route('detallProduct', $item->id) }}">
                <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded mb-2">
                    <h3 class="font-medium text-md">{{ $item->name }}</h3>
                    <p class="text-sm text-gray-600">{{ number_format($item->price) }} VNĐ</p>
                </div>
            </a>
        @empty
            <p class="text-gray-500">Không có sản phẩm liên quan.</p>
        @endforelse
    </div>
</div>
@endsection
