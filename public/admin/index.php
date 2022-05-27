<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username'];
}
require_once('koneksi.php');
$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$usr'");
$hasil = mysqli_fetch_array($query);
if (empty($hasil['username'])) {
    header('Location: login.php');
}
function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
@ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <title>T & F Laundry</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet" />
        <link href="css/waves-effect.css" rel="stylesheet">
        <link href="assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="assets/toggles/toggles.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" /><script src="js/modernizr.min.js"></script> 
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</style>
</head>
    <body data-spy="scroll" data-target=".navbar" class="fixed-left">
    
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><span>Aplikasi Laundry </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                
                <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">Selamat Datang, <?php echo $hasil['username']; ?> <img src="images/user.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                              
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="images/user.png" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $hasil['nama']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php"><i class="md md-settings-power"></i>&amp; Logout</a></li>
                                </ul>
                        </div>
                            <p class="text-muted m-0"><?php echo $hasil['level']; ?></p>
                </div>
            </div>

            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="?p=home" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                    </li>
                    <li>
                        <a href="?p=tambaht" class="waves-effect"><i class="fa fa-plus"></i><span> Buat Transaksi </span></a>
                    </li>
					<li>
                        <a href="?p=riwayatt" class="waves-effect"><i class="fa fa-clock-o"></i><span> Riwayat Transaksi </span></a>
                    </li>
                    <?php if ($hasil['level']!=='Konsumen') { ?>
					<li>
                        <a href="?p=tambahko" class="waves-effect"><i class="fa fa-user-plus"></i><span> Tambah Konsumen </span></a>
                    </li>
                    <li>
                        <a href="?p=maps" class="waves-effect"><i class="fa fa-map-marker"></i><span> Maps </span></a>
                    </li>
                    
			        <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-list"></i> <span> Data </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <!-- <li><a href="?p=barang">Barang</a></li> -->
                            <li><a href="?p=datako">Konsumen</a></li>
						    <!-- <li><a href="?p=datas">Supplier</a></li> -->
                            <li><a href="?p=dataA">Admin</a></li>
						    <li><a href="?p=datak">Karyawan</a></li>
						    <li><a href="?p=jenis">Jenis Laundry Kiloan</a></li>
						    <li><a href="?p=jenis2">Jenis Laundry Satuan</a></li>
						    <!-- <li><a href="?p=beli">Pembelian</a></li>
						    <li><a href="?p=pakai">Pemakaian</a></li> -->
                        </ul>
                    </li>
					<?php if ($hasil['level']=='Administrator') { ?>
				    <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-user"></i> <span> Admin Menu </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="?p=tambaha">Tambah Admin/CEO</a></li>
                            <li><a href="?p=tambahk">Tambah Karyawan</a></li>
							<li><a href="?p=tambahs">Tambah Supplier</a></li>
							<li><a href="?p=olahk">Olah Karyawan</a></li>
							<li><a href="?p=olahs">Olah Supplier</a></li>
                        </ul>
                </li>
                    <?php } ?>
                    <?php } ?>
        </ul>
            <div class="clearfix"></div>
        </div>
            <div class="clearfix"></div>
        </div>
            </div>                    
            
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">Aplikasi Laundry v1.0</h4>
                        </div>
                    </div>
                    <?php include "konten.php"; ?>
                </div> 
            </div>
        </div>
        
        <footer class="footer text-left">
            <div style="text-align:right;" >copyright &copy; <?php echo date('Y'); ?> <a href="https://sityoy.com"> sityoy.com</a> | Theme by Moltran.</div>
        </footer>
        </div>
    
    
        <script>
            var resizefunc = [];
        </script>
        <script>
        function reloadpage()
        {
        location.reload()
        }
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        <script src="js/jquery.app.js"></script>
        <script src="assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="assets/toggles/toggles.min.js"></script>
        <script src="assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js"></script>
        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARhWUhoaMVsNvTFf2rXbW3sIFSk_tLUKk&callback=initialize"></script>
        
        <script type="text/javascript"> </script>  
        <!-- API : AIzaSyDO032z_UgzT78ZclW6iHEFxsUpFbnsFWg -->
        <script>
            // fungsi initialize untuk mempersiapkan peta
            function initialize() {
            // var propertiPeta = {
            //     center:new google.maps.LatLng(-6.1251386,106.7166616,15),
            //     zoom:20,
            //     mapTypeId:google.maps.MapTypeId.ROADMAP
            // };

            $('#frame-map').attr('src','https://maps.google.com/maps?q=-6.1251386,106.7166616&t=&z=16&ie=UTF8&iwloc=&output=embed');
            
            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
            }

            // event jendela di-load  
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                });
                    
                    // $('#datepicker').datetimepicker({
                        // format: 'DD MMMM YYYY',
                    // });
                    
                    // $('#timepicker').datetimepicker({
                        // format: 'HH:mm'
                    // });
                });
        </script>
        <script>
            $(function() {
                $("#datepicker").datepicker
                    ({
                        dateFormat: 'yy-mm-dd',
                        minDate: "today",
                        maxDate: "+120d"
                    });
                $("#datepicker").datepicker("setDate", "3");
                });
        </script> 
        <script>
            function sum() {
                //   var txtFirstNumberValue = document.getElementById('txt1').value;
                var txtSecondNumberValue = document.getElementById('txt2').value;
                var result = /* parseInt(txtFirstNumberValue) - */ parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt3').value = result;
                }
            }

                // function hanyaAngka(evt) {
                //   var charCode = (evt.which) ? evt.which : event.keyCode
                //    if (charCode > 31 && (charCode < 48 || charCode > 57))
        
                //     return false;
                //   return true;
                // }
        </script>

        <script>
            $("#inputdate").inputdate(function() {
                var start = $(this).val(),
                end   = new Date(),  
                diff  = new Date(start - end),  
                days  = diff/1000/60/60/24;  
                
                if (days >= 1) {
                    console.log("boleh");
                } else {
                    console.log("tidak boleh");
                }
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                dataTable = $('#datatable').dataTable();
            });
        </script>

	</body>
</html>