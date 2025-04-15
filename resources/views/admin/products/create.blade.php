@extends("admin.layouts.app")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lí sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              <form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    @error("name")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label>Giá</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá">
                    @error("price")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng">
                    @error("quantity")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="image">
                  </div>

                  <div class="form-group">
                    <label>mô tả sản phẩm</label>
                    <input type="text" class="form-control" name="description" placeholder="Nhập mô tả">
                    @error("description")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $value )
                    @if($value->id != 16)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endif
                    @endforeach
                </select>
                    @error("category_id")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Trạng thái</label>
                   <select name="status" id="" class="form-control">
                    <option value="0">Tạm dừng</option>
                    <option value="1">Hoạt động</option>
                   </select>
                   @error("status")
                   <p class="text-danger">{{ $message  }}</p>
                   @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
   @push("scripts")
   <script>
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
</script>
   @endpush