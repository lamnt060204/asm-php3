@extends('client.layouts.app')

@section('content')
<div class="p-4">
  <h1 class="text-2xl font-bold mb-6">Trang chủ</h1>
<h1> Đây là git</h1>
  <!-- Thanh điều hướng + danh mục -->
  <div class="flex flex-col md:flex-row gap-6 mb-6">
    <aside class="w-full md:w-1/4 bg-white p-4 rounded shadow">
      <h2 class="text-lg font-semibold mb-4">Danh mục</h2>
      <ul class="space-y-2">
        @foreach ($category as $value )
        <li><a href="?cate={{ $value->id }}" class="text-blue-600 hover:underline">{{ $value->name }}</a></li>
        @endforeach
        

      </ul>

      <!-- Bộ lọc giá -->
      <div class="mt-6">
        <h3 class="text-md font-semibold mb-2">Lọc theo giá</h3>
        <div class="space-y-2">
          <form action="">
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="price[]" value="1m" class="form-checkbox"onchange="this.form.submit()">
            <span>Dưới 1 triệu</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="price[]" value="1m5" class="form-checkbox"onchange="this.form.submit()">
            <span>1 - 5 triệu</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="price[]" value="5m" class="form-checkbox"onchange="this.form.submit()">
            <span>Trên 5 triệu</span>
          </label>
          </form>
        </div>
      </div>

      <!-- Bộ lọc theo giá tăng và giảm -->
      <div class="mt-6">
        <h3 class="text-md font-semibold mb-2">Sắp xếp theo giá</h3>
        <form action="">
        <select name="sort" onchange="this.form.submit()" class="form-select w-full border p-2 rounded">
                <option value="">-- Chọn sắp xếp --</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
                <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Sản phẩm mới nhất</option>
                <option value="view" {{ request('sort') == 'view' ? 'selected' : '' }}>Lượt xem nhiều nhất</option>
            </select>
            </form>
      </div>
    </aside>

    <div class="w-full md:w-3/4">
      <!-- Tìm kiếm -->
      <div class="mb-6">
        <form action="" method="get" class="flex gap-2">
          <input type="text" name="sreach" placeholder="Tìm kiếm sản phẩm..." class="form-input flex-1" />
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Tìm kiếm</button>
        </form>
      </div>

      <!-- Hàng: Sản phẩm mới nhất -->
      <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Danh sách sản phẩm</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          @foreach ( $products as $value )
          
            <a href="{{ route("detallProduct",$value->id) }}">
              <div class="bg-white rounded shadow p-4">
                <img src="{{ asset( 'storage/' . $value->image) }}" alt="Sản phẩm" class="w-full h-40 object-cover mb-2 rounded">
                <h2 class="text-lg font-semibold">{{ $value->name }}</h2>
                <p class="text-sm">{{ number_format($value->price) }} VNĐ</p>
                <p class="text-xs text-gray-500">{{ $value->views }}Lượt xem</p>
              </div>
            </a>
            @endforeach

        </div>
        {{ $products->links() }}
      </div>

      <!-- Hàng: Sản phẩm nhiều lượt xem nhất -->
   
    </div>
  </div>
</div>
@endsection
