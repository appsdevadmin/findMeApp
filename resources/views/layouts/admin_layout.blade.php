<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NNPC Limited</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}"> -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat::300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  
 <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;
        }

        .left {
            width: 45%;
        }
        .right {
            width: 15%;
        }

        .middle {
            width: 40%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .bold{
            font-weight:700;
        }
            .center p {
                display: inline-block;
                line-height: normal;
                vertical-align: middle;
                margin: 0;
            }

        .signature-wrapper {
            border: solid 1px #6F6F6F;
            font-family: Montserrat, Helvetica, Arial, sans-serif;
            width: 580px;
            height: 180px;
            font-size:10px;
            color:#6F6F6F;
        }
        .sig-person {
            margin: 0px;
            font-size: 14px;
            vertical-align: middle;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 160px;
        }
        .sig-company {
            vertical-align: middle;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 160px;
        }

        .sig-logo {
        }
        .div-wrapper {
            position: relative;
            height: 140px;
        }

            .div-wrapper img {
                position: absolute;
                left: 0;
                bottom: 0;
            }
            #sig-person h4{
                margin:0;
                font-size:16px;
                font-weight:800;
                color:#000000;
            }
        #sig-company ul {
            margin: 0;
            list-style-image: none;
            list-style-type:none;
            padding-inline-start:0;
        }
        .module {
            max-width: 250px;
            height:120px;
            padding: 1rem;
            border-width: 2px;
            border-style: solid;
            border-color:  #FFFFFF;
            background: linear-gradient(180deg, #769C1D, #FDF085, transparent);
            background-repeat: repeat-y;
            background-size: 1px auto;
        }
        .left-icon {
            width: 10%;
        }
        .right-icon {
            width: 90%;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-dark" style="background-color: #1A2F3E">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home/menu" class="nav-link">🏠  Home</a>
      </li>
	  @if(Session::get('role_id') == 1)
      <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="/home/menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">⚙️ Administrators</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="/manage_users/menu" class="dropdown-item">Administrators</a></li>
        </ul>
      </li>
	  @endif
	  @if((Session::get('role_id') == 1)  || (Session::get('role_id') == 2))
      <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">⌨️ Staff</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="/view_staff/menu" class="dropdown-item">View Staff</a></li>
          <li><a data-toggle="modal" data-target="#xmodal-lgx" class="dropdown-item">Search Staff</a></li>
        </ul>
      </li>

	  @endif
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="/home/logout" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt" style="color: white"></i>
        </a>
      </li>
    </ul>
 </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1A2F3E">
    <!-- Brand Logo -->
    <a href="/home/menu" class="brand-link" style="background-color: #1A2F3E">
      <span class="brand-text font-weight-light"><img src="{{asset('img/nnpc_limited.png') }}" alt="" class="img-fluid" width="100" height="80"><h4></h4></span>
    </a>
	<br/>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{Session::get('firstname')}} {{Session::get('surname')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		    @if(Session::get('role_id') == 1)
          <li class="nav-item has-treeview menu-close">
            <a href="/home/menu" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                 Administrators
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manage_users/menu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrators</p>
                </a>
              </li>
            </ul>
          </li>
		    @endif
		  @if((Session::get('role_id') == 1)  || (Session::get('role_id') == 2))
		  <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			      <li class="nav-item">
                <a href="/view_staff/menu" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Staff</p>
                </a>
             </li>
             <li class="nav-item">
                <a data-toggle="modal" data-target="#xmodal-lgx" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search Staff</p>
                </a>
              </li>
            </ul>
          </li>
		 @endif
         <li class="nav-item has-treeview menu-close">
            <a href="/home/logout" class="nav-link">
              <i class="nav-icon fas fa-lock red"></i>
              <p>
                Logout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     @yield('content')


	 <div class="modal fade" id="xmodal-lgx">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <b class="modal-title">Search Staff</b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {!! Form::open(['method'=>'POST','url'=>'search_staff','onsubmit' => 'showWait()']) !!}


			  <div class="row">
				<div class="col-sm-12">
				  <!-- textarea -->
				  <div class="form-group">
					<label>Staff ID</label>
					<input type="text" id="staff_id" name="staff_id" class="form-control" max="5" min="5" placeholder="Enter Staff ID" required />
				  </div>
				</div>

			  </div>
			</div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success">Search</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
{{--			{!! Form::hidden('staff_id', $staff_data->staff_id ?? '')!!}--}}
			{!! Form::close() !!}

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="background-color: #1A2F3E">
    <strong>Copyright &copy; 2022<a href="#"> NNPC Limited</a>.</strong>
    All rights reserved.
    <!--div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div-->
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin_assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin_assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('admin_assets/dist/js/demo.js') }}"></script> -->

<!-- DataTables -->
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin_assets//plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('admin_assets/dist/js/adminlte.min.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->

<!-- page script -->
<script>

  // $(document).ready(function () {
  //     $('.nav-item').click(function () {
  //       $('.sidebar-mini').removeClass('sidebar-open');
  //       $('.sidebar-mini').addClass('sidebar-closed sidebar-collapse');
  //     });
  //   });

  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
</body>
</html>
