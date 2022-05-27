			<?php
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

	                            break;
                        case "hapus":
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM konsumen WHERE id='$_GET[id]'");
  header('location:../index.php?p=olahko');
	                            break;
                        case "update":
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE konsumen SET nama='$_POST[nama]',alamat='$_POST[alamat]',telp='$_POST[telp]' WHERE id='$_POST[id]'");
							 
  header('location:../index.php?p=olahko');  
	}
                    ?>
      
      