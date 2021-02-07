<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../backend/plugins/fontawesome-free/css/all.min.css">


  <link rel="stylesheet" href="../backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="../backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script type="text/javascript">
    BASE_URL = "<?php echo url(''); ?>";
  </script>
  <style>
     @media only screen and (max-width: 786px) {
       .font-size-mobile{
           font-size:1.5rem;
       }
       .table-responsive-custom{
           overflow-x:auto;
           width:100%;
           display: block;
       }



      }
      aside.main-sidebar{
          background-color:#28a745!important;
          /* background-color:#f4f6f9!important; */
          color:#fff;
      }
      a.brand-link , div.user-panel{
          border-bottom: 1px solid #f8f9fa !important;
      }
      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active{
          background-color: #faf8fa;
          color:#000;
      }
      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link{
          color:#000;
      }
      .logo-project{
        color: #f8f9fa;
      }
      .font-weight-bold{
          font-weight: 600 !important;
      }
      .user-panel img {
        height: auto;
        width: 3.1rem;
       }
       .user-panel .image{
           padding:0px;
       }
       .question h2{
          font-size:1.5rem;
      }

      .option .checkbox input:before{
        width:16px;
        height: 16px;
        content: '';
        border: 2px solid #cacaca;
        background-color: #fff;
        position: absolute;
        left: 0;
        top: 4px;
      }
      .option .checkbox input[type="radio"]:checked:after{
        content: '';
        width:5px;
        height: 10px;
        position: absolute;
        border:solid #30b1bd;
        transform: rotate(45deg);
        border-width: 0 2px 2px 0;
        left: 6px;
        top: 5px;
      }
      .dropdown-menu-lg {
        max-width: 300px;
        min-width: 300px;
        padding: 0;
      }

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-md-none d-block">
        <img src="../images/colorlogo.png" width="160px">
    </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}
    <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
              <span class="dropdown-item dropdown-header font-weight-bold">Student Information</span>
              <div class="dropdown-divider"></div>
             <div class="w-100 pt-2 pb-2 d-flex justify-content-between"><span class="text-capitalize font-weight-bold text-center w-50 d-inline-block">Name :</span> <span class="text-center d-inline-block text-capitalize w-50">{{$exam_data[0]['name']}}</span></div>
              <div class="dropdown-divider"></div>
              <div class="w-100 pt-2 pb-2 d-flex justify-content-between"><span class="text-capitalize font-weight-bold text-center w-50 d-inline-block">Email :</span> <span class="text-center d-inline-block text-capitalize w-50">{{$exam_data[0]['email']}}</span></div>
              <div class="dropdown-divider"></div>
              <div class="w-100 pt-2 pb-2 d-flex justify-content-between"><span class="text-capitalize font-weight-bold text-center w-50 d-inline-block">Mobile Number :</span> <span class="text-center d-inline-block text-capitalize w-50">{{$exam_data[0]['mobile_no']}}</span></div>
              <div class="dropdown-divider"></div>
              <div class="w-100 pt-2 pb-2 d-flex justify-content-between"><span class="text-capitalize font-weight-bold text-center w-50 d-inline-block">Date of Birth :</span> <span class="text-center d-inline-block text-capitalize w-50">{{$exam_data[0]['dob']}}</span></div>
            </div>
          </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
       {{-- <center><h3 style="font-size: 20px; color: #fff; text-transform:  uppercase;"></h3></center> --}}
       <img src="../images/colorlogo.png" width="150px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="../images/software.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
        <div class="logo info pl-2">
          <h5 class="logo-project m-0">{{$exam_data[0]['name']}}</h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{url('/student/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/student/exams')}}" class="nav-link">
                <i class="far fas fa-th nav-icon"></i>
                <p>
                  Exams
                </p>
              </a>
            </li>
          <li class="nav-item">
          <a href="{{url('student/logout')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>



{{--
          <li class="nav-item">
                <a href="{{ url('/student/logout') }}"class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
          </li> --}}
          </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
  </aside>




    @yield('content')



  <footer class="main-footer text-center">
    <strong>Copyright © 2020 <a href="#"> | PN INFOSYS IT COMPANY IN GWALIOR ! </a>.</strong>
    All rights reserved.

  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
<script src="../backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../backend/plugins/chart.js/Chart.min.js"></script>

<script src="../backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../backend/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../backend/dist/js/demo.js"></script>
<script src="../backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../backend/docs/assets/js/custom.js"></script>

<script>
  $(document).ready(function(){
    $('.categorytable').DataTable();
 });

</script>
@yield('join_button')
</body>
</html>
