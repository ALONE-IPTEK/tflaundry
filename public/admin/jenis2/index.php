
<?php

$aksi="jenis2/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Data Jenis Laundry</h3> 
                                    </div>  <div class='panel-body'> 
									<p align='right'><a class='btn btn-primary' href='?p=jenis2&aksi=tambah'><i class='icon-plus'></i>Tambah Jenis Laundry</a></p>
                                   <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th><i class='icon-time'></i> Jenis2</th>
                                            <th><i class='icon-signal'></i> Harga/Kg</th>
										<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 ORDER BY id");
							while($r=mysqli_fetch_array($tp)){
						    //$hargaa = $r['harga'];
                             echo"<tr>
                                    <td>$r[jenis2]</td>
									<td>$r[harga]</td>
                                    <td><a class='btn btn-primary' href='?p=jenis2&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
									 <a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id]'><i class='icon-trash'></i>Hapus</td>
                                    
                                </tr>";
								$i=$i+1;
							}
                               
                                        
                        echo"</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   ";    

break;
case "edit":
	$edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis2 WHERE id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
echo "<form method='post' action='jenis2/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Edit Jenis Laundry</h3> 
                                    </div>  <div class='panel-body'> 
					<input type='hidden' name='id' value='$r[id]'>
					 <div class='control-group'>
					   <div class='form-group'>
                            <label>Jenis</label>
                            <div class='span9'><input class='form-control' value='$r[jenis2]'  type='text' name='jenis2' /></div>
                        </div>						
					   <div class='form-group'>
                            <label>Harga/Kg</label>
                            <div class='span9'><input class='form-control' size='16' type='number' value='$r[harga]' name='harga' /></div>
                        </div>
					<Br>

			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=harga'>Batal</a>
		  </form>
		</div> 
		                  
		                  
                    </div></div>
					
		";
echo "";
break;
case "tambah":
    echo "<form method='post' action='jenis2/proses.php?act=input' enctype='multipart/form-data'>";
    echo '<div class="panel panel-border panel-primary">
                                        <div class="panel-heading"> 
                                            <h3 class="panel-title"><i class="fa fa-list"></i> Tambah Barang</h3> 
                                        </div>  <div class="panel-body"> 
                         <div class="control-group">
                           <div class="form-group">
                                <label>Jenis</label>
                                <div class="span9"><input class="form-control" placeholder="Masukan Jenis Laundry"  type="text" name="jenis2" /></div>
                            </div>						
                           <div class="form-group">
                                <label>Harga/Kg</label>
                                <div class="span9"><input class="form-control" size="16" type="number" placeholder="Masukan Harga Laundry" name="harga" /></div>
                            </div>				 
                        <Br>
    
                <input type="submit" class="btn btn-primary" value="Tambah"> <a class="btn btn-danger" href="?p=jenis2">Batal</a>
              </form>
              <br>
    
            </div> 
                              
                       </div></div> ';
    echo "";
    break;



			}//penutup switch
?>    
</body>

</html>