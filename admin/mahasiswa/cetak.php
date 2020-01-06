<?php

    /**
     * Halaman view.php untuk manajemen data mahasiswa
    */

    //memanggil connect.php untuk ceck
    require_once "../../config/connection.php";

    //memanggil check_login.php untuk check status login
    require_once "../../config/cek_login.php";


    $nama = $_GET['nama'];
    $sql = $conn->query("SELECT * FROM peserta WHERE nama ='$nama'");
    $tampil = $sql->fetch_assoc(); 
    $hasil1 = $tampil['nama'];
    $hasil2 = $tampil['nilai'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Data Nilai</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

     <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">Data Nilai</a>
            </div>
        </div>
    </nav>

    <!-- #Top Bar -->
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                
               <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Halo </div>
                    <div class="email">Anda login sebagai <?php echo $_SESSION['jabatan'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php include "navigasi.php";?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Data Mahasiswa
                                            </h2>
                                            
                                        </div>
                                        <div class="body">
                                           <form target="_blank" method="POST" action="certificate.php" >
                                                <label for="">NPM</label>
                                                <div class="form-group">
                                                     <div class="form-line">
                                                     <input type="text" class="form-control" name="namadisable" disabled="yes" value="<?=$tampil['npm']; ?>" />
                                                            </div>
                                                        </div>


                                                <label for="">Nama</label>
                                                <div class="form-group">
                                                     <div class="form-line">
                                                     <input type="text" class="form-control" name="namadisable" disabled="yes" value="<?php
								 //berfungsi verifikasi, menampilkan nama hasil input saja tapi tidak dikirim ke untuk dicetak (certificate.php) karena status input tersebut disable
								 	echo "$hasil1";
								
								   ?>" ></input>
                                                            </div>
                                                        </div>

                                                <label for="">Nilai</label>
                                                <div class="form-group">
                                                     <div class="form-line">
                                                     <input type="text" class="form-control" name="namadisable" disabled="yes" value="<?php
								 //berfungsi verifikasi, menampilkan nama hasil input saja tapi tidak dikirim ke untuk dicetak (certificate.php) karena status input tersebut disable
								 	echo "$hasil2";
								
								   ?>" ></input>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="namacetak" value="<?php
								 //berfungsi mengirim nama yang telah diinput dan sesuai untuk di cetak ke (certificate.php)
								 	echo "$hasil1";
								 	
								   ?>"></input>

<input type="hidden" name="nilaicetak" value="<?php
								 //berfungsi mengirim nama yang telah diinput dan sesuai untuk di cetak ke (certificate.php)
								 	echo "$hasil2";
								 	
								   ?>"></input>
                                                

                                               
                                                        <input id="get" type="submit" class="btn btn-primary" value="Get Certificate Now" name="certificate" target="_blank"></input>
                                                        
                                            </form>


    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
   

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
     <script src="../../js/pages/tables/jquery-datatable.js"></script>
     

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
