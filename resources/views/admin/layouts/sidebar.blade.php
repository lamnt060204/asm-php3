<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset("admin../../index3.html")}}" class="brand-link">
      <img src="{{asset("admin/assets/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("admin/assets/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Trang chủ
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p> Quản Danh mục </p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admin.categories.index") }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-minus"></i>
                  <p>Danh Sách Danh mục</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admin.listSoftDeleteCategores") }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-minus"></i>
                  <p>Danh mục đã xóa</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
             <p> Quản lý sản phẩm </p>
             <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admin.products.index") }}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admin.listSoftDelete") }}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>Sản phẩm đã xóa</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style>
    /* General sidebar styling */
.main-sidebar {
    background-color: #1d1d2c; /* Darker color for a sleek look */
}

.brand-link {
    background-color: #33334c;
    padding: 15px;
    display: flex;
    align-items: center;
    text-align: center;
}

.brand-link .brand-image {
    opacity: 1;
    margin-right: 10px;
}

.brand-text {
    color: #f0f0f0;
    font-weight: 600;
    font-size: 1.2em;
}

/* User Panel */
.user-panel {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.user-panel .image img {
    border-radius: 50%;
    border: 2px solid #ddd;
}

.user-panel .info a {
    color: #b8b8d0;
    font-weight: 600;
    font-size: 1em;
    margin-left: 10px;
}

/* Sidebar Menu Links */
.nav-sidebar > .nav-item > .nav-link {
    color: #c7c7e1;
    font-size: 1em;
    margin: 2px 0;
    padding: 10px 15px;
    transition: background 0.3s, color 0.3s;
}

.nav-sidebar > .nav-item > .nav-link:hover {
    background-color: #33334c;
    color: #ffffff;
}

.nav-sidebar .nav-icon {
      color: #b0b0d0;
  }

/* Treeview Menu */
.nav-treeview .nav-item .nav-link {
    padding-left: 35px;
    font-size: 0.95em;
}

.nav-treeview .nav-item .nav-link:hover {
    background-color: #2c2c3f;
    color: #e0e0f0;
}

.nav-treeview .nav-icon {
    color: #9494b8;
}

/* Active link styling */
.nav-sidebar > .nav-item > .nav-link.active {
    background-color: #44445c;
    color: #ffffff;
    border-left: 4px solid #ff8c00; /* Highlight active link */
}

.nav-sidebar > .nav-item > .nav-link.active .nav-icon {
    color: #ff8c00;
}

  </style>
