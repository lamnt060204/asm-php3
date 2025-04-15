<!-- header -->
@include("admin.layouts.header")
<!-- end header -->
@stack("styles")

<!-- navbar -->
@include("admin.layouts.navbar")

<!-- end navbar -->

<!-- Main Sidebar Container -->
@include("admin.layouts.sidebar")
<!-- Content Wrapper. Contains page content -->
@yield("content")

<!-- Main content -->

<!-- /.content -->
<!-- /.content-wrapper -->
<!-- Footer -->
@include("admin.layouts.footer")

<!-- Page specific script -->

<!-- Code injected by live-server -->
@stack("scripts")
</body>

</html>