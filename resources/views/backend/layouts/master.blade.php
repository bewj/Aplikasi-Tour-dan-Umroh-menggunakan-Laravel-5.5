<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sako Holidays | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-green.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/DataTables/media/css/dataTables.bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Theme Browser Mobile -->
    <meta name="theme-color" content="#12B58A">
    <meta name="msapplication-navbutton-color" content="#12B58A">
    <meta name="msapplication-Tilecolor" content="#12B58A">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#12B58A">
    <!-- Icon -->
    <link type="image/x-icon" rel="icon" href="{{ asset('favicon.ico')}}">
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('favicon.ico')}}">
    <meta http-equiv="expires" content="{{ date('l, d-F-Y, H:i:s, T', strtotime('next day')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Pace loading bar-->
    <script src="{{ asset('js/pace.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/pace.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-green sidebar-mini">

    <!-- Wrapper Start -->
    <div class="wrapper">

      <!-- Main Header Start -->
      <header class="main-header">

        <!-- Logo Start -->
        <a href="{{ route('dashboard.admin') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{ asset('img/logo sako holidays.png') }}" alt="LOGO" style="height: 35px; width: 35px;"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sako </b>Holidays</span>
        </a>
        <!-- Logo End -->

        <!-- Header Navbar Start -->
        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button Start -->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Siderbar toggle button End -->

          <!-- Navbar Right Menu Start -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a href="{{ route('beranda') }}" target="_blank">View Website</a></li>
              <!-- Messages: style can be found in dropdown.less Start-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <!-- end message -->
                    </ul>
                    <!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Messages: style can be found in dropdown.less End -->

              <!-- Notifications Menu Start -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Notifications Menu End -->

              <!-- User Account Menu Start -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin: 0 15px">
                  <!-- The user image in the navbar-->
                  <img src="{{ asset('dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }} &nbsp; <i class="fa fa-caret-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                    <p>
                      {{ config('app.name') }}
                      <small>Level 1 : {{ Auth::user()->name }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ route('dashboard.admin.profile') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a id="logout" href="#" class="btn btn-default btn-flat">Sign out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="post">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu End -->

            </ul>
          </div>
          <!-- Navbar Right Menu End-->

        </nav>
        <!-- Header Navbar End -->

      </header>
      <!-- Main Header End -->

      <!-- Left side column. contains the logo and sidebar Start -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less Start -->
        <section class="sidebar">

          <div style="height:15px;"></div>
          <!-- Sidebar user panel (optional) Start -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-primary"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar user panel (optional) End -->

          <div style="height:15px;"></div>

          <!-- Sidebar Menu First Start -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MANAGEMENT WEBSITE</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- Dashboard -->
            <li class="{{ set_active('dashboard.admin') }}">
              <a href="{{ route('dashboard.admin')}}"><i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <!-- Cek Pemesanan -->
            <li class="{{ set_active('cek-pemesanan') }}">
              <a href="#">
                <i class="fa fa-search"></i>
                <span>Cek Pemesanan</span>
              </a>
            </li>
            <!-- Pesawat -->
            <li class="{{ set_active('pesawat') }}">
              <a href="#"><i class="fa fa-plane"></i> <span>Tiket Pesawat</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Hotel -->
            <li class="treeview {{ set_active('hotel') }}">
              <a href="#"><i class="fa fa-building"></i> <span>Hotel</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Tour -->
            <li class="treeview">
              <a href="#"><i class="fa fa-globe"></i> <span>Tour</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ set_active('tour.index') }}"><a href="{{ route('tour.index') }}">Daftar Paket Tour</a></li>
                <li class="{{ set_active('tour.pemesanan') }}"><a href="{{ route('tour.pemesanan') }}">Daftar Pemesanan Tour</a></li>
                <li class="{{ set_active('tour.permintaan') }}"><a href="{{ route('tour.permintaan') }}">Daftar Permintaan Tour</a></li>
              </ul>
            </li>
            <!-- Umroh -->
            <li class="treeview">
              <a href="#"><i class="fa fa-cube"></i> <span>Umroh</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ set_active('umroh.index') }}"><a href="{{ route('umroh.index') }}">Daftar Paket Umroh</a></li>
                <li class="{{ set_active('umroh.pemesanan') }}"><a href="{{ route('umroh.pemesanan')}}">Daftar Pemesanan Umroh</a></li>
              </ul>
            </li>
            <!-- Kereta Api -->
            <li class="{{ set_active('keretaapi') }}">
              <a href="#"><i class="fa fa-train"></i> <span>Tiket Kereta</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Sewa Mobil -->
            <li class="{{ set_active('sewamobil') }}">
              <a href="#"><i class="fa fa-bus"></i> <span>Sewa Mobil</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Promo -->
            <li class="{{ set_active('promo') }}">
              <a href="#"><i class="fa fa-tags"></i> <span>Promo</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Blog -->
            <li class="{{ set_active('blog.index') }}">
              <a href="{{ route('blog.index')}}">
                <i class="fa fa-sticky-note"></i>
                <span>Artikel</span>
              </a>
            </li>
            <!-- Gallery -->
            <li class="{{ set_active('gallery') }}">
              <a href="#">
                <i class="ion ion-image"></i>
                <span>Gallery</span>
              </a>
            </li>
            <!-- Slideshow -->
            <li class="{{ set_active('slideshow') }}">
              <a href="#">
                <i class="ion ion-images"></i>
                <span>Slideshow</span>
              </a>
            </li>
            <!-- Karir -->
            <li class="{{ set_active('karir') }}">
              <a href="#">
                <i class="fa fa-handshake-o"></i>
                <span>Karir</span>
              </a>
            </li>
          </ul>
          <!-- Sidebar Menu First End -->

          <div style="height:15px;"></div>

          <!-- Sidebar Menu Second Start -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MANAGEMENT SYSTEM</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- Navigasi Web -->
            <li class="{{ set_active('navigasi-web') }}">
              <a href="#"><i class="fa fa-bars"></i>
                <span>Navigasi Web</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Role User -->
            <li class="{{ set_active('role-user') }}">
              <a href="#"><i class="fa fa-user"></i>
                <span>Role User</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Member User -->
            <li class="{{ set_active('member') }}">
              <a href="#"><i class="ion ion-person-stalker"></i>
                <span>Users</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
            <!-- Backup Databases -->
            <li class="{{ set_active('backup') }}">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Backup Database</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">Coming Soon</small>
                </span>
              </a>
            </li>
          </ul>
          <!-- Sidebar Menu Second Start -->

          <div style="height:150px;"></div>
        </section>
        <!-- sidebar style can be found in sidebar.less End-->

      </aside>
      <!-- Left side column. contains the logo and sidebar End -->

      <!-- Content Wrapper. Contains page content Start -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) Start -->
        <section class="content-header">
          <h1>
            Dashboard
            <small><b>Day : </b>{!! date('l') !!} &nbsp;<b>Date : </b> {!! date('d - F - Y')!!}&nbsp;&nbsp;<b>Clock : </b><span id="output-clock"></span></small>
          </h1>
          <ol class="breadcrumb">
            @yield('breadcrumb')
          </ol>
        </section>
        <!-- Content Header (Page header) End -->

        <!-- Main content Start -->
        <section class="content container-fluid">

          @yield('content')

        </section>
        <!-- Main content End -->

      </div>
      <!-- content-wrapper. Contains page content End  -->

      <!-- Main Footer Start -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Version Alpha 0.0.4 By {{ config('app.name') }}
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php $thn = "2017"; $dat = date('Y'); if($dat == $thn) { echo $dat; } else { echo $thn.'-'.$dat; }?> <a href="{{ url('/') }}">sakotour.com</a>.</strong> All rights reserved.
      </footer>
      <!-- Main Footer End -->

    </div>
    <!-- Wrapper End -->

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('assets/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Tinymce -->
    <script src="{{ asset('assets/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/fastclick/lib/fastclick.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <!-- Date and Time Script -->
    <script>

    </script>
    <script type="text/javascript">
      $(function() {
        $('#lfm').filemanager('image');
        var editor_config = {
          path_absolute : "/",
          selector: "#itinerary, #terms_conditions, #deskripsi",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };

        tinymce.init(editor_config);

        $('#start_period').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          startDate: '1d'
        });
        $('#end_period').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          startDate: '+1d'
        });
        $('#logout').click(function(e) {
          e.preventDefault();
          $('#logout-form').submit();
        });
        // Show Time realtime
        setInterval(function() {
          var currentTime = new Date();
          var hours = currentTime.getHours();
          var minutes = currentTime.getMinutes();
          var seconds = currentTime.getSeconds();
          var timezone = currentTime.getTimezoneOffset(),o = Math.abs(timezone);

          // Add leading zeros
          hours = (hours < 10 ? "0" : "") + hours;
          minutes = (minutes < 10 ? "0" : "") + minutes;
          seconds = (seconds < 10 ? "0" : "") + seconds;
          timezone = (timezone < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
          if (timezone == "+07:00") {
            var zone = 'Asia/Jakarta';
          } else if (timezone == "+08:00") {
            var zone = 'Asia/Makasar';
          } else if (timezone == "+09:00") {
            var zone = 'Asia/Jayapura';
          }
          var currentTimeString = hours + ":" + minutes + ":" + seconds + " &nbsp; <b>Zone : </b>" + zone;
          $("#output-clock").html(currentTimeString);
        }, 1000);
      });
    </script>
    @yield('scripts')
   </body>
</html>
