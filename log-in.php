<?php
session_start();
error_reporting(0);
include("koneksi.php");

$nama_admin = $_POST['nama_admin'];
$pass_admin = $_POST['pass_admin'];

// query untuk mendapatkan record dari username
$hasil = pg_query("SELECT * FROM admin WHERE nama_admin = '$nama_admin' ");
$data = pg_fetch_array($hasil);
$a = $data['pass_admin'];




			if ($pass_admin == $data['pass_admin'])
				{
				$_SESSION['id_admin'] = $data['id_admin'];
    			$_SESSION['nama_admin'] = $data['nama_admin'];
    			pg_query( "UPDATE admin SET status= 1 WHERE nama_admin='".$_SESSION['nama_admin']."'" );
    			echo"<script>;location.href='index.php';alert('Login Berhasil') </script>";
    			  }
    		else { echo "<script>;location.href='index.php';alert('Gagal Masuk')  </script>"; }  
				

	




?>