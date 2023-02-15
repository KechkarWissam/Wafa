<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.extra.meta')
  <title>Wafa | Mailbox</title>  
  @include('admin.layouts.extra.css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin/dist/img/wafa-logo.png" alt="Wafa Logo" height="60" width="60">
  </div>

   @include('admin.layouts.navbars.navbar') 
   @include('admin.layouts.sidebars.sidebar') 
   @include('admin.layouts.navbars.header') 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    </div>
   @include('admin.layouts.footers.footer') 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.layouts.extra.js')

</body>
</html>
