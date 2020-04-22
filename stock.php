<?php
	session_start();
	if(empty($_SESSION['username']))
	{
		header("location:../index.php?pesan_user=belum_login");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Gudang | Stock</title>
</head>
<body>
	<nav>
		<a href="index.user.php">Home</a> | 
		<a href="stock.php">Stock</a> | 
		<a href="stock.add.php">Add</a> | 
		<a href="stock.report.php">Report</a>
	</nav>
	<table border="1px">
		<thead>
			<tr>
				<td>Kode</td>
				<td>Jenis Barang</td>
				<td>Jumlah</td>
			</tr>
		</thead>
		<tbody>
		<?php
			include 'includes/db.php';
			$sql	= "SELECT * FROM stock INNER JOIN type ON stock.type_code = type.type_code" ;
			$query 	= mysqli_query($conn, $sql);

			while ($data = mysqli_fetch_array($query)) {
		?>
			<tr>
				<td><?= $data['code']; ?></td>
				<td><?= $data['type']; ?></td>
				<td><?= $data['qty']; ?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</body>
</html>