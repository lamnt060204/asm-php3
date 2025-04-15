<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thương Mại</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">Shop Online</a>
            <nav class="space-x-4">
                <a href="#" class="text-blue-600 hover:underline">Trang chủ</a>
                <a href="#" class="text-blue-600 hover:underline">Sản phẩm</a>
                <a href="#" class="text-blue-600 hover:underline">Liên hệ</a>
            </nav>
            <div class="relative ml-6">
                    <div class="flex items-center space-x-4">
                        @if(Auth::check()) 
                        <span class="font-medium">Xin chào, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="get">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Xác nhận đăng xuất')">Đăng xuất</button>
                        </form>
                        @else
                        <form action="{{ route('login') }}" method="get">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline">Đăng nhập</button>
                        </form>
                        @endif
                    </div>

            </div>
        </div>
    </header>

    <!-- Nội dung -->
    <main class="container mx-auto">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-12 p-4 text-center text-sm text-gray-500">
        © 2025 Trang thương mại. All rights reserved.
    </footer>

</body>
</html>
