<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'assets/php/koneksi.php';

if(!isset($_SESSION['username'])){
	header("Location: ../index.php");
}

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if($data['level_user']=="Admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_user'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/dashboard.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level_user']=="Manajer"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_user'] = "Manajer";
		// alihkan ke halaman dashboard pegawai
		header("location:manajer/dashboard.php");

	// cek jika user login sebagai pengurus
	}else if($data['level_user']=="Bos"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_user'] = "Bos";
		// alihkan ke halaman dashboard pengurus
		header("location:bos/dashboard.php");

	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>