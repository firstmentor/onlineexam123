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

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
      .question h2{
          font-size:1.5rem;
      }
      .question .option .checkbox input:before{
        width:16px;
   height: 16px;
   content: '';
   border: 2px solid #cacaca;
   background-color: #fff;
   position: absolute;
   left: 0;
   top: 0;
      }
      .question .option .checkbox input[type="radio"]:checked:after{
        content: '';
    width:5px;
   height: 10px;
   position: absolute;
   border:solid #30b1bd;
   transform: rotate(45deg);
   border-width: 0 2px 2px 0;
   left: 6px;
   top: 2px;

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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
       <center><h3 style="font-size: 20px; color: #fff; text-transform:  uppercase;"></h3></center>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <h5 style="color: #fff;">Online Examination System</h5>
        </div>
        <div class="info">

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{url('/admin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('admin/category')}}" class="nav-link">
              <i class="far fas fa-th nav-icon"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/manage_exams')}}" class="nav-link">
              <i class="far fas fa-th nav-icon"></i>
              <p>Manage Exams</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('/students')}}" class="nav-link">
              <i class="far fas fa-th nav-icon"></i>
              <p>Students</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/portal')}}" class="nav-link">
                <i class="far fas fa-th nav-icon"></i>
                <p>Portals</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/results')}}" class="nav-link">
                    <i class="far fas fa-th nav-icon"></i>
                    <p>Results</p>
                  </a>
            </li>



          <li class="nav-item">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
          </li>
          </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
  </aside>




    @yield('content')



  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
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
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="../backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../backend/docs/assets/js/custom.js"></script>

<script>
  $(document).ready(function(){
    $('.categorytable').DataTable();
    var table = $('#results').DataTable({
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Export excel',
      className: 'exportExcel',
      filename: 'Export excel',
      exportOptions: {
        modifier: {
          page: 'all'
        }
      }
    },
    'copyHtml5',
    'csvHtml5',
    'pdfHtml5'
    ]
  });
 });
</script>
</body>
</html>
