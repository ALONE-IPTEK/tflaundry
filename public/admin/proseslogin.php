<?php
session_start();
require_once ('koneksi.php');
function antiinjection($data){
  $filter_sql = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$user = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));
$cekuser = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengguna WHERE username = '$user'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
if ( $jumlah == 0 ) {
header('location:login.php?userfail');
} else {
    if ( $pass <> $hasil['password'] ) {
header('location:login.php?passwordfail');
    } else {
        $_SESSION['username'] = $user;
        header('location:index.php');
    }
}
?>