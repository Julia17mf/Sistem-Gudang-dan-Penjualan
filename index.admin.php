<?php
	session_start();
	if(empty($_SESSION['username']))
	{
		header("location:../index.php?pesan_admin=belum_login");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Gudang | Home</title>
</head>
<body>
	<nav>
		<a href="index.admin.php">Home</a> | 
		<a href="admin.stock.php">Laporan Stok</a> | 
		<a href="admin.sale.php">Laporan Penjualan</a> | 
		<a href="admin.stock.report.php">Laporan Stok Akhir</a> | 
		<a href="admin.sale.report.php">Laporan Penjualan Akhir</a> | 
		<a href="includes/logout.php">Logout</a>
	</nav>
</body>
</html>