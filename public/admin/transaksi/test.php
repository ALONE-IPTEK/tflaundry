<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}

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
if(isset($_POST['jenis'])){	
$jeniss				= $_POST['jenis'];
$jeniss2			= $_POST['jenis2'];
$query				= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis WHERE jenis = '$jeniss'");
$query2 			= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 WHERE jenis2 = '$jeniss2'");

$hasil 				= mysqli_fetch_array($query);

$hasil2 			= mysqli_fetch_array($query2);

$harga				= $hasil['harga'];
$harga2				= $hasil2['harga'];

$berat				= $_POST['berat'];
$berat2				= $_POST['berat2'];
$konsumen			= $_POST['konsumen'];
$nota				= $_POST['nota'];

$tarif = $berat*$harga;
$tarif2 = $berat2*$harga2;

$tarif3 = $tarif+$tarif2;

$tgl_ambil		= $_POST['tgl_ambil'];
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$tgl_transaksi=date('Y-m-d');



	
	$input = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO transaksi VALUES(NULL, '$jeniss', '$jeniss2', '$tarif', '$tarif2', $tarif3, '0', '$tgl_transaksi', '$tgl_ambil', '$berat', '$berat2' ,'$usr','$konsumen', '$nota')") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>
Transaksi Berhasil!</b></h4>';		
		echo '
		<b>Rincian Transaksi</b><br>
		============================<Br>
		No. Nota : <b>'.$nota.'</b><br>
		Konsumen : <b>'.$konsumen.'</b><br>
		Jenis Laundry Kiloan :<li> <b>'.$jeniss.' - '.$berat.'</b></li>
		Jenis Laundry Satuan :<li> <b>'.$jeniss2.' - '.$berat2. '</b></li>
		Tarif Kiloan : <b>Rp. ' . number_format( $tarif, 0 , '' , '.' ) . ',-</b><br>
		Tarif Satuan : <b>Rp. ' . number_format( $tarif2, 0 , '' , '.' ) . ',-</b><br>
		Jumlah : <b>Rp. ' . number_format( $tarif3, 0 , '' , '.' ) . ',-</b><br>
		Tanggal Transaksi : <b>'.TanggalIndo($tgl_transaksi).'</b><br>
		Tanggal Ambil : <b>'.TanggalIndo($tgl_ambil).'</b><br>
		============================
		</div>
		
		';	
		
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }
 
?>
	<form method="post">
		<div class="form-group">
            <label>No. Nota</label>
            <input type="number" class="form-control" name="nota" placeholder="Nomor Nota" required>
        </div>
		
		<div class="form-group">
            <label>Konsumen</label>
			<input type="text" class="form-control" name="konsumen" placeholder="Masukkan Nama">
		</div>
		<div class="form-group">
        	<label>Jenis</label>
            	<select  class="form-control" name="jenis">
					<?php
						$tp2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis ORDER BY id");
						while($r2=mysqli_fetch_array($tp2)){
					?>
				<option value="<?php echo $r2['jenis'];?>"><?php echo $r2['jenis'];?></option>
			<?php } ?>
				</select>
			
			<select  class="form-control" name="jenis2">
				<?php
					$tp3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 ORDER BY id");
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
        	<input id="txt3" onkeyup="sum();" readonly>
    	</div>
		
		<div class="form-group">
    		<label>Tanggal Ambil</label>
    		<input type="text" readonly id="datepicker" class="form-control" name="tgl_ambil" required>
		</div>
		
			<pre>*Cek Data Dengan Teliti</pre>
	
			<button type="submit" class="btn btn-primary waves-effect waves-light">Buat Transaksi</button>
		</form>
    </div>
</div>

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
		$(function() {
  			$("#datepicker").datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: "today",
			maxDate: "+30d",
			});
		$("#datepicker").datepicker("setDate", "1");
		});
</script>




<?php
include "../koneksi.php";
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:../login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
$tp=mysqli_query($conn, "SELECT * FROM transaksi WHERE pengguna='$usr' ORDER BY tgl_transaksi ASC");
?>
<style>
	th{
		border-style: solid; 
		border-width: thin;
		text-align: center;
	}
	td{
		border-style: solid; 
		border-width: thin;
	}
	
</style>
<div class='panel panel-border panel-primary' role="navigation">
    <div class='panel-heading'>
    <h3 class='panel-title'><i class='fa fa-clock-o'></i> Riwayat Transaksi</h3> 
</div>  

<div class='panel-body'> 
	<div class="row">
        <table style="border-style: solid; border-width: thin;" id='rtable' class='table table-hover'>
            <thead>
                <tr>
					<th><i class='icon-terminal'></i> No</th>
					<th><i class='icon-signal'></i> Konsumen</th>
					<th><i class='icon-signal'></i> Nota</th>
					<th><i class='icon-terminal'></i> Jenis Kiloan</th>
					<th><i class='icon-terminal'></i> Jenis Satuan</th>
					<th><i class='icon-signal'></i> Tarif Kiloan</th>
					<th><i class='icon-signal'></i> Tarif Satuan</th>
					<th><i class='icon-signal'></i> Total Satuan dan Kiloan</th>
					<th><i class='icon-signal'></i> Berat Kiloan</th>
					<th><i class='icon-signal'></i> Berat Satuan</th>
					<th><i class='icon-signal'></i> Tanggal Transaksi</th>
					<th><i class='icon-signal'></i> Tanggal Ambil</th>

					<th><i class='icon-signal'></i> Kwitansi</th>
                </tr>
            </thead>
    <tbody>
<?php

$i=1;
while($r=mysqli_fetch_array($tp)){
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $r['pengguna'];?></td>		 
        <td><?php echo $r['konsumen'];?></td>
        <td><?php echo $r['nota'];?></td>
        <td><?php echo $r['jenis'];?></td>
        <td><?php echo $r['jenis2'];?></td>
		<td><?php echo'Rp.' . number_format( $r['tarif'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo'Rp.' . number_format( $r['tarif2'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo'Rp.' . number_format( $r['jumlah'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo $r['berat']?> Kg</td>
		<td><?php echo $r['berat2']?> Kg</td>
		<td><?php echo TanggalIndo($r['tgl_transaksi']);?></td>
		<td><?php echo TanggalIndo($r['tgl_ambil']);?></td>
		<td><a href="transaksi/kwitansi.php?id=<?php echo $r['id'];?>" target="_blank">Lihat Kwitansi</a></td>
    </tr>
	
	<?php $i=$i+1; ?>
<?php } ?>
	</tbody>
	
<script>
    $(document).ready(function() {
	   $('#table').DataTable();
	} );
</script>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->   