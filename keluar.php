<?php
session_start();
error_reporting(0);
include("koneksi.php");

	 pg_query( "UPDATE admin SET status= 0  WHERE nama_admin='".$_SESSION['nama_admin']."'" );

session_destroy();
echo "<script>;location.href='index.php';alert('Logout Berhasil') </script>";
?>