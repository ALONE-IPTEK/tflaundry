<?php
include "../koneksi.php";
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:../login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
$query = mysqli_query($conn, "SELECT * FROM transaksi  ORDER BY tgl_transaksi");?>
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
        <table style="border-style: solid; border-width: thin;" id='datatable' class='table table-hover'>
            <thead>
                <tr>
					<th><i class='icon-terminal'></i> No</th>
					<th><i class='icon-terminal'></i> Admin</th>
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
while($data = mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $data['pengguna'];?></td>		 
        <td><?php echo $data['konsumen'];?></td>
        <td><?php echo $data['nota'];?></td>
        <td><?php echo $data['jenis'];?></td>
        <td><?php echo $data['jenis2'];?></td>
		<td><?php echo'Rp.' . number_format( $data['tarif'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo'Rp.' . number_format( $data['tarif2'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo'Rp.' . number_format( $data['jumlah'], 0 , '' , '.' ) . ',-'?></td>
		<td><?php echo $data['berat']?> Kg</td>
		<td><?php echo $data['berat2']?> Pcs</td>
		<td><?php echo TanggalIndo($data['tgl_transaksi']);?></td>
		<td><?php echo TanggalIndo($data['tgl_ambil']);?></td>
		<td><a href="transaksi/kwitansi.php?id=<?php echo $data['id'];?>" target="_blank">Lihat Kwitansi</a></td>
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