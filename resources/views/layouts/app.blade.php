<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Bank</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                        <a href="{{url('admin/governorates')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Governorates</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/cities')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Cities</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/categories')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Categories</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/posts')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Posts</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/clients')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Clients</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/contacts')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Contact</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/donations')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Donations</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/users')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>users</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/roles')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>roles</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/settings/1/edit')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('admin/pages')}}" class="nav-link">
                          <i class="nav-icon far fa-list text-info"></i>
                          <p>Pages</p>
                        </a>
                      </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('dist/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
@stack('scripts')
</body>
</html>
