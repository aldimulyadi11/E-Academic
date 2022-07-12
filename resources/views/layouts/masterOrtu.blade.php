
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E - Academic</title>

    <!-- icon -->
    <link rel="shortcut icon" href="/asset/production/images/poto.png">
    <!-- Bootstrap -->
    <link href="/asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/asset/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/asset/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="/asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/asset/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- bootstrap-wysiwyg -->
    <link href="/asset/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="/asset/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/asset/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/asset/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="/asset/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="/asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="/asset/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/ortuDashboard" class="site_title"><!-- <img src="/asset/production/images/poto.png" alt="..." class="img-circle" width="40" height="40" style="background-color: white; border: 2px solid white"> --> <span>E - Academic</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/asset/production/images/mhs.png" height="58" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome Orang Tua</span>
                <h2>{{Session::get('nama_mhs')}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>E - Academic System</h3>
                <ul class="nav side-menu">
                  <li><a href="/ortuDashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="/mhsKrs2"><i class="fa fa-book"></i> Kartu Rencana Studi</a></li>
                  <li><a href="/mhsJadwal2"><i class="fa fa-table"></i> Jadwal Kuliah</a></li>
                  <li><a><i class="fa fa-book"></i> Nilai Mahasiswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">      
                      <li><a href="{{'dataNilaiUtsMhs2'}}"><i class="fa fa-book"></i> UTS</a></li>
                      <li><a href="{{'dataNilaiUasMhs2'}}"><i class="fa fa-book"></i> UAS</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Kartu Hasil Studi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">      
                      <li><a href="{{'mhsKhsOrtu'}}"><i class="fa fa-book"></i>Semester 1</a></li>
                      <li><a href="{{'mhsKhsOrtu2'}}"><i class="fa fa-book"></i>Semester 2</a></li>
                      <li><a href="{{'mhsKhsOrtu3'}}"><i class="fa fa-book"></i>Semester 3</a></li>
                      <li><a href="{{'mhsKhsOrtu4'}}"><i class="fa fa-book"></i>Semester 4</a></li>
                      <li><a href="{{'mhsKhsOrtu5'}}"><i class="fa fa-book"></i>Semester 5</a></li>
                      <li><a href="{{'mhsKhsOrtu6'}}"><i class="fa fa-book"></i>Semester 6</a></li>
                      <li><a href="{{'mhsKhsOrtu7'}}"><i class="fa fa-book"></i>Semester 7</a></li>
                      <li><a href="{{'mhsKhsOrtu8'}}"><i class="fa fa-book"></i>Semester 8</a></li>
                    </ul>
                  </li>
                </ul>
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/asset/production/images/mhs.png" alt="">{{Session::get('nama_mhs')}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{'settingOrtu'}}"><i class="fa fa-cogs pull-right"></i>Tentang Aplikasi</a></li>
                    <li><a data-toggle="modal" data-target="#modal-ortu"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>

              <div class="modal fade" id="modal-ortu">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Log Out</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Apakah Anda Yakin Ingin Keluar?</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <a href="/logout" class="btn btn-primary">Keluar</a>
                    </div>
                  </div>                        
                </div>                      
              </div>
              <div style="position: relative;left:62%;top:20px;">
                <?php
                      $hari = date('l');
                      /*$new = date('l, F d, Y', strtotime($Today));*/
                      if ($hari=="Sunday") {
                       echo "Minggu";
                      }elseif ($hari=="Monday") {
                       echo "Senin";
                      }elseif ($hari=="Tuesday") {
                       echo "Selasa";
                      }elseif ($hari=="Wednesday") {
                       echo "Rabu";
                      }elseif ($hari=="Thursday") {
                       echo("Kamis");
                      }elseif ($hari=="Friday") {
                       echo "Jum'at";
                      }elseif ($hari=="Saturday") {
                       echo "Sabtu";
                      }
                      ?>,

                      <?php
                      $tgl =date('d');
                      echo $tgl;
                      $bulan =date('F');
                      if ($bulan=="January") {
                       echo " Januari ";
                      }elseif ($bulan=="February") {
                       echo " Februari ";
                      }elseif ($bulan=="March") {
                       echo " Maret ";
                      }elseif ($bulan=="April") {
                       echo " April ";
                      }elseif ($bulan=="May") {
                       echo " Mei ";
                      }elseif ($bulan=="June") {
                       echo " Juni ";
                      }elseif ($bulan=="July") {
                       echo " Juli ";
                      }elseif ($bulan=="August") {
                       echo " Agustus ";
                      }elseif ($bulan=="September") {
                       echo " September ";
                      }elseif ($bulan=="October") {
                       echo " Oktober ";
                      }elseif ($bulan=="November") {
                       echo " November ";
                      }elseif ($bulan=="December") {
                       echo " Desember ";
                      }
                      $tahun=date('Y');
                      echo $tahun;
                      ?>

                      Jam

                      <script type="text/javascript">        
                          function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
                          var waktu = new Date();            //membuat object date berdasarkan waktu saat 
                          var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
                          var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
                          var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
                          document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
                          }
                      </script>

                      <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
                      <span id="clock"></span>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            E - Academic By Aldi Mulyadi</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/asset/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/asset/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/asset/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/asset/vendors/iCheck/icheck.min.js"></script>
    <!-- Chart.js -->
    <script src="/asset/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/asset/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/asset/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/asset/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/asset/vendors/Flot/jquery.flot.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/asset/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/asset/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/asset/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/asset/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/asset/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/asset/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/asset/vendors/moment/min/moment.min.js"></script>
    <script src="/asset/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="/asset/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="/asset/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="/asset/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="/asset/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="/asset/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="/asset/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="/asset/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="/asset/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/asset/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="/asset/vendors/starrr/dist/starrr.js"></script>

    <!-- Datatables -->
    <script src="/asset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/asset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/asset/vendors/datatables.net-scroller/js/dataTabless.scroller.min.js"></script>
    <script src="/asset/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/asset/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/asset/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/asset/build/js/custom.min.js"></script>
  
  </body>
</html>
