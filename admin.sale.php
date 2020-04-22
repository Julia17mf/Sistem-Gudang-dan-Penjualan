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
	<title>Sistem Gudang | Cashier</title>
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
	<table border="1">
		<thead>
			<tr>
				<td>Tanggal</td>
				<td>Jenis</td>
				<td>Model</td>
				<td>Jumlah</td>
				<td>Harga</td>
				<td>Total</td>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'includes/db.php';

				$sql	= "SELECT * FROM sale_report
				INNER JOIN sale ON sale_report.id_sale = sale.id_sale
				INNER JOIN bag ON sale_report.id_bag = bag.id_bag
				INNER JOIN bag_type ON bag.id_bag_type = bag_type.id_bag_type
				INNER JOIN bag_model ON bag.id_bag_model = bag_model.id_bag_model";
				$query 	= mysqli_query($conn, $sql);

				while ($data = mysqli_fetch_array($query)) {
					$price = number_format($data['bag_price'], 2, ',', '.');
					$total = number_format($data['total'], 2, ',', '.');
			?>
			<tr>
				<td><?= $data['date'] ?></td>
				<td><?= $data['bag_type'] ?></td>
				<td><?= $data['bag_model'] ?></td>
				<td><?= $data['bag_qty'] ?></td>
				<td>Rp <?= $price ?></td>
				<td>Rp <?= $total ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</body>
</html>