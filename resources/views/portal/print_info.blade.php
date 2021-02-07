<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Receipt</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../backend/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../backend/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../backend/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <style>
      .data-var h3{
          border-bottom: 1px solid #999;
      }
      .card-header .row .col-6 h2{
          text-transform: capitalize;
          font-weight: bold;
      }
      body{
          background: url('../images/abc.jpg');
          background-position: center;
          background-repeat: no-repeat;        
        background-attachment: fixed;
        background-size: 100% 100%;
      }
  </style>

</head>
<body class="">
<div class="wrapper">
    <section class="content">
        <div class="container mt-5">
            <div class="row ">
                <div class="offset-2 col-8">

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title mb-3" style="width: 100%; font-size:20px;"><span
                                    style="float: left">{{$exam['title']}}</span><span
                                    style="float: right">{{ date('d M,y',strtotime($exam['exam_date']))}}</span></h3> --}}
                                    <div class="row mb-2">
                                        <div class="col-6 text-left"><h2>{{$exam['title']}}</h2></div>
                                        <div class="text-right col-6"><h2>{{$exam['exam_date']}}</h2></div>
                                    </div> 
                        </div>
                        <div class="card-body">
                             <div class="row mb-2">
                                 <div class="col-6 text-center"><h3>Name :</h3></div>
                                 <div class="text-center offset-1 data-var col-4"><h3>{{$datas['name']}}</h3></div>
                             </div>
                             <div class="row mb-2">
                                <div class="col-6 text-center"><h3>Email :</h3></div>
                                <div class="col-4 text-center offset-1  data-var"><h3>{{$datas['email']}}</h3></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 text-center"><h3>Mobile_no :</h3></div>
                                <div class="col-4 text-center offset-1 data-var"><h3>{{$datas['mobile_no']}}</h3></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 text-center"><h3>Date of Birth :</h3></div>
                                <div class="col-4 text-center offset-1 data-var"><h3>{{$datas['dob']}}</h3></div>
                            </div>

                            {{-- <form action="{{ url('/portal/registration_form_submit') }}" method="post" class="all_add">
                                @csrf
                            <input type="hidden" name="id" value="{{$id}}"> 
                                <div class="form-group">
                                    <label for="exampleInput1">Name </label>
                                    <input type="text" class="form-control" name="name" placeholder="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Email </label>
                                    <input type="email" class="form-control" name="email" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Mobile no. </label>
                                    <input type="number" class="form-control" name="mobile_no" placeholder="Mobile No"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Password </label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">DOB </label>
                                    <input type="date" class="form-control" name="dob" placeholder="Date of birth"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary register_exam" style="float: right">
                                    Register </button>
                            </form> --}}


                        </div>
                        <!-- /.card-body -->
                      <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary print" style="float: right">
                            Print </button>
                      </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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
<!-- Sparkline -->
<script src="../backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../backend/plugins/moment/moment.min.js"></script>
<script src="../backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../backend/dist/js/pages/dashboard.js"></script>
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
</body>
</html>