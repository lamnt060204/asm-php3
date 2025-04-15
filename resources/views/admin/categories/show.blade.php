@extends("admin.layouts.app")
@section("content")
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên danh mục</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status == 0 ?"Tạm dừng" : "Hoạt động" }}</td>
                </tr>
                </tbody>
            </table>

            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá sản phẩm</th>
                  <th>Số lượng</th>
                  <th>Hình ảnh</th>
                  <th>Trạng thái</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($productById as $key => $value )
                
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->quantity }}</td>
                    <td>{{ asset("$value->image")}}</td>
                    <td>{{ $value->status == 0 ?"Tạm dừng" : "Hoạt động" }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
  @endsection
  