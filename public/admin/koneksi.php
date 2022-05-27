<?php
//  $server="localhost"; //Nama server default xampp tersebut biasanya localhost
//  $konek="root"; //Nama root ini biasanya default dari xampp tersebut
//  $password=""; //Isikan password jika diminta password pada halam awal ke localshost/phpmyadmin kalau tidak ada biarkan saja
//  $db="db_laundry"; //Sesuaikan dengan nama database yang anda sudah buat
 
//  $konek = ($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $konek, $password)) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
//  $database = mysqli_select_db($GLOBALS["___mysqli_ston"], $db);
//  date_default_timezone_set("Asia/Jakarta");

// Konfigurasi Database

$host="localhost";
$user="root";
$pass="";
$database="db_laundry";

$conn =($GLOBALS["___mysqli_ston"] = mysqli_connect($host,  $user,  $pass));
mysqli_select_db($conn, $database);
date_default_timezone_set("Asia/Jakarta");

?>