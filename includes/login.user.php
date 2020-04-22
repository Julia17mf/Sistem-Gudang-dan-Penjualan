<?php
	session_start();
	//menghubungkan koneksi
	$query		= new mysqli('localhost', 'root', '', 'gudang');

	//menangkap data yang dikirim dari form
	$username	= $_POST['username'];
	$password	= $_POST['password'];

	//menyeleksi data admin dengan username dan password yang sesuai
	$data 		= mysqli_query($query, "SELECT * FROM user where username = '$username' and password = '$password'")
				or die(mysqli_error($query));

	//menghitung jumlah yang ditemukan
	$cek		= mysqli_num_rows($data);

	if($cek > 0)
	{
		$_SESSION['username']	= $username;
		$_SESSION['status']		= "login";
		header("location:../index.user.php");
	}
	else
	{
		header("location:../index.php?pesan_user=gagal");
	}
?>