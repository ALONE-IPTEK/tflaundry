			<?php
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
			$harga = $_POST['harga'];
			$harga2 = $harga*5000;
			include "../koneksi.php";
                    $p=isset($_GET['act'])?$_GET['act']:null;
                    switch($p){
                        default:

                            break;
                        case "input":						
   mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO jenis VALUES (NULL,'$_POST[jenis]','$_POST[harga]')");
   header('location:../index.php?p=jenis');

	                            break;
                        case "hapus":
mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM jenis WHERE id='$_GET[id]'");
  header('location:../index.php?p=jenis');
  
	                            break;
                        case "update":
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE jenis SET jenis='$_POST[jenis]',harga='$_POST[harga]' WHERE id='$_POST[id]'");
							 
  header('location:../index.php?p=jenis');  
	}
                    ?>
      