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
		<a href="home.php">Home</a> | 
		<a href="stock.php">Stock</a> | 
		<a href="cashier.php">Cashier</a> | 
		<a href="includes/logout.php">Logout</a>
	</nav>
</body>
</html>