<link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet" />
        <link href="../css/waves-effect.css" rel="stylesheet">
        <link href="../assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="../assets/toggles/toggles.css" rel="stylesheet" />
        <link href="../assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="../assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="../assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="../assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" /><script src="js/modernizr.min.js"></script> 
        <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php 


$query7 = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$usr'");
$hasil7 = mysqli_fetch_array($query7);

?>

<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
        	<h3 class='panel-title'><i class='fa fa-user-plus'></i> Buat Transaksi</h3> 
</div>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js"></script>

<div class='panel-body'> 

<?php


$query5 = mysqli_query($conn, "SELECT max(nota) as nota FROM transaksi");
$data = mysqli_fetch_array($query5);

$kodeBarang = $data['nota'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;

$angka = "000";
$kodeBarang = $angka . sprintf("%03s", $urutan);


if(isset($_POST['jenis'])){	
$jeniss				= $_POST['jenis'];
$jeniss2			= $_POST['jenis2'];
$query				= mysqli_query($conn, "SELECT * FROM jenis WHERE jenis = '$jeniss'");
$query2 			= mysqli_query($conn, "SELECT * FROM jenis2 WHERE jenis2 = '$jeniss2'");

$hasil 				= mysqli_fetch_array($query);

$hasil2 			= mysqli_fetch_array($query2);

$harga				= $hasil['harga'];
$harga2				= $hasil2['harga'];

$usr				= $hasil7['nama'];
$berat				= $_POST['berat'];
$berat2				= $_POST['berat2'];
$konsumen			= $_POST['konsumen'];
$nota				= $_POST['nota'];

$tarif = $berat*$harga;
$tarif2 = $berat2*$harga2;

$tarif3 = $tarif+$tarif2;
// $tgl_ambil = strtotime($_POST['tgl_ambil']);
// if ($tgl_ambil) {
//   $new_date = date('Y-m-d', $tgl_ambil);
//   echo $new_date;
// } else {
//    echo 'Invalid Date: ' . $_POST['tgl_ambil'];
//   // fix it.
// }
 $tgl_ambil = $_POST['tgl_ambil'];

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');

	
	$input = mysqli_query($conn, "INSERT INTO transaksi VALUES(NULL, '$jeniss', '$jeniss2', '$tarif', '$tarif2', $tarif3, '0', '$tgl_transaksi', '$tgl_ambil', '$berat', '$berat2' ,'$usr','$konsumen', '$nota')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		==============================<Br>
		Admin : <b>'.$usr.'</b><br>

		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry Kiloan :<li> <b>'.$jeniss.' - '.$berat.'</b></li>
		Jenis Laundry Satuan :<li> <b>'.$jeniss2.' - '.$berat2. '</b></li>
		Tarif Kiloan : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tarif Satuan : <b>Rp. ' . number_format( $tarif2, 0 , '' , '.' ) . ',-</b><br>
		Jumlah : <b>Rp. ' . number_format( $tarif3, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		==============================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
	header("location:transaksi/data.php");
  }
 
?>
	<form method="post" action="transaksi/data.php">
		<!-- <div class="form-group">
            <label>Admin</label>
            <input style="cursor: no-drop;"type="number" class="form-control" name="nota" value="<?php echo $hasil['nama'] ?>" placeholder="Nomor Nota" readonly>
        </div> -->
		<div class="form-group">
            <label>No. Nota</label>
            <input style="cursor: no-drop;"type="number" class="form-control" name="nota" value="<?php echo $kodeBarang ?>" placeholder="Nomor Nota" readonly>
        </div>
		
		<div class="form-group">
            <label>Konsumen</label>
			<input type="text" class="form-control" name="konsumen" placeholder="Masukkan Nama">
		</div>
		<div class="form-group">
        	<label>Jenis</label>
            	<select  class="form-control" name="jenis">
				<option value=""></option>
					<?php
						$tp2=mysqli_query($conn, "SELECT * FROM jenis ORDER BY id");
						while($r2=mysqli_fetch_array($tp2)){
					?>
				<option value="<?php echo $r2['jenis'];?>"><?php echo $r2['jenis'];?></option>
			<?php } ?>
				</select>
			<br>
			<select  class="form-control" name="jenis2">
			<option value=""></option>
				<?php
					$tp3=mysqli_query($conn, "SELECT * FROM jenis2 ORDER BY id");
					while($r3=mysqli_fetch_array($tp3)){
				?>
			<option value="<?php echo $r3['jenis2'];?>"><?php echo $r3['jenis2'];?></option>
			<?php } ?>
			</select>
		</div>

		<div class="form-group">
        	<label>Berat (Dalam <i style="color: blue;">Kilogram</i>)</label>
        	<input type="number" class="form-control" name="berat" placeholder="Masukan Berat Pakaian(Pakai Angka)" required>
    	</div>

		<div class="form-group">
        	<label>Berat (Dalam <i style="color: red;">Satuan</i>)</label>
        	<input type="number" class="form-control" name="berat2" placeholder="Masukan Berat Pakaian(Pakai Angka)" id="txt2" onkeyup="sum();">
    	</div>

		<div class="form-group">
        	<label><i style="color: purple;">Jumlah</i></label>
        	<input style="cursor: no-drop;" type="number" id="txt3" onkeyup="sum();" readonly>
    	</div>

		<div class="form-group">
    		<label>Tanggal Transaksi</label>
			<input style="cursor: no-drop;" type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" name="tgl_ambil" readonly>
		</div>
		
		<div class="form-group">
    		<label id="start">Tanggal Ambil</label>
    		<!-- <input type="date" class="form-control" id="start" name="trip-start"
			value="2022-03-11"
			min="2022-03-11" max="2030-12-31"> -->
			<input type="date" class="form-control" id="datepicker" name="tgl_ambil" min="today" max="+30d" > 
		</div>

			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
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
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/waves.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../assets/jquery-detectmobile/detect.js"></script>
        <script src="../assets/fastclick/fastclick.js"></script>
        <script src="../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="../assets/jquery-blockui/jquery.blockUI.js"></script>
        <script src="../js/jquery.app.js"></script>
        <script src="../assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="../assets/toggles/toggles.min.js"></script>
        <script src="../assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="../assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="../assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../assets/spinner/spinner.min.js"></script>
        <script src="../assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initialize" async defer></script>
        <script type="text/javascript"> </script>  
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
	$(function() {
  			$("#datepicker").datepicker({
			format: 'yyyy-mm-dd',
			minDate: "today",
			maxDate: "+30d",
			});
		$("#datepicker").datepicker("setDate", "1");
	});
		
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
            } );
</script>