@extends("admin.layouts.app")
@section("content")
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Quản lí danh mục</h1>
        @if(session("success"))
      <div class="aler aler-success">
      {{ session("success") }}
      </div>
    @endif

        @if(session("error"))
      <div class="alert alert-danger">
      {{ session("error") }}
      </div>
    @endif
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
    <form method="get" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="{{ request('search') }}">
      <button class="btn btn-outline-secondary">Tìm kiếm</button>
    </div>
    </form>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-12">
        <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($softDeletedCategories as $key => $value)
          <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->status == 0 ? "Tạm dừng" : "Hoạt động" }}</td>
          <td>
            <form action="{{ route('admin.deleteForeverCategory', $value->id) }}" method="POST"
            style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
            onclick="return confirm('Bạn có muốn xóa không?')">Xóa vĩnh viễn</button>
            </form>

            <a href="{{ route('admin.restoreCategory', $value->id) }}" class="btn btn-success" onclick="return confirm('Bạn có muốn khôi phục không')">Khôi phục</a>
          </td>

          </tr>
          </tbody>
        @endforeach
          </table>
          {{ $softDeletedCategories->links('pagination::bootstrap-5') }}

        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
  @endsection
  @push("scripts")
   
  @endpush