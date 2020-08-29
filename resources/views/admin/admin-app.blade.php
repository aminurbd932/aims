<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Dashboard') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('admin/bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('admin/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('admin/dist/css/skins/_all-skins.min.css') !!}
  <!-- Morris chart -->
  {!! Html::style('admin/bower_components/morris.js/morris.css') !!}
  <!-- jvectormap -->
  {!! Html::style('admin/bower_components/jvectormap/jquery-jvectormap.css') !!}
  <!-- Date Picker -->
  {!! Html::style('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  <!-- Daterange picker -->
  {!! Html::style('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}

    <!-- Bootstrap time Picker -->
  {!! Html::style('admin/custom/css/plugin/mdtimepicker.css') !!}
  <!-- bootstrap wysihtml5 - text editor -->
  {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

  {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') !!}
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  {!! Html::style('admin/custom/css/global.css') !!}
  <script type="text/javascript">
    var base_url = "{{ URL::to('/')}}";
</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('../admin/layouts/header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    @include('../admin/layouts/left-sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('admin-content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('../admin/layouts/footer')
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{!! Html::script('admin/bower_components/jquery/dist/jquery.min.js') !!}

<!-- jQuery UI 1.11.4 -->
{!! Html::script('admin/bower_components/jquery-ui/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<!-- Bootstrap 3.3.7 -->
{!! Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
{!! Html::script('admin/bower_components/raphael/raphael.min.js') !!}
{!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
<!-- daterangepicker -->
{!! Html::script('admin/bower_components/moment/min/moment.min.js') !!}

<!-- datepicker -->

{!! Html::script('admin/custom/js/plugin/datepicker.js') !!}
{!! Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- bootstrap time picker -->
{!! Html::script('admin/custom/js/plugin/mdtimepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('admin/bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('admin/dist/js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('admin/dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('admin/dist/js/demo.js') !!}
{!! Html::script('admin/custom/js/sweetalert2.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') !!}


{{--  custom validator  --}}
{!! Html::script('admin/custom/js/custom-validator.js') !!}

{{--        javascript   loop     --}}
    @if (isset($page_scripts))
      @foreach ($page_scripts as $pscript)
        {!! Html::script($pscript) !!}
      @endforeach
    @endif
{!! Html::script('admin/custom/js/global.js') !!}

@if (session('sweet-success'))
  <script type="text/javascript">
    showAlertMessage('Sucess...', '{{ session('sweet-success') }}', 'success');
  </script>
@endif
@if (session('sweet-unsuccess'))
  <script type="text/javascript">
    showAlertMessage('Unsucess...', '{{ session('sweet-unsuccess') }}', 'warnings');
  </script>
@endif
@if (session('sweet-error'))
  <script type="text/javascript">
    showAlertMessage('Error...', '{{ session('sweet-error') }}', 'error');
  </script>
@endif
@if (session('sweet-permission'))
  <script type="text/javascript">
    showAlertMessage('Permission...', '{{ session('sweet-permission') }}', 'error');
  </script>
@endif

<!-- Common Modal -->
<div id="commonModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="commonModalTitle"></h4>
      </div>
      <div class="modal-body" id="commonModalBody">
        <div class="loader"></div>
      </div>
      <div class="modal-footer" id="commonModalFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

</div>

</body>
</html>
