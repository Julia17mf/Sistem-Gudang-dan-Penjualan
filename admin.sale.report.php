<?php
	session_start();
	if(empty($_SESSION['username']))
	{
		header("location:../index.php?pesan_user=belum_login");
	}
	if(isset($_GET['month'])) {
		$month 	= $_GET['month'];
	}else
		$month 	= "01";
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
	<form method="POST" action="includes/admin.sale.report.php">
		<table>
			<tr>
				<td>Pilih Bulan</td>
				<td>
					<select name="month">
						<?php
							include 'includes/db.php';

							$sql 	= "SELECT * FROM month WHERE id_month = $month";
							$query 	= mysqli_query($conn, $sql);

							while ($data = mysqli_fetch_array($query)) {
						?>
						<option style="display: none;" selected><?= $data['month']; ?></option>
						<?php
							}

							$sql2 	= "SELECT * FROM month";
							$query2	= mysqli_query($conn, $sql2);

							while ($data2 = mysqli_fetch_array($query2)) {
						?>
						<option value="<?= $data2['id_month']; ?>"><?= $data2['month']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><button type="submit">Pilih</button></td>
			</tr>
		</table>
	</form>
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

				$sql3	= "SELECT * FROM sale_report
				INNER JOIN sale ON sale_report.id_sale = sale.id_sale
				INNER JOIN bag ON sale_report.id_bag = bag.id_bag
				INNER JOIN bag_type ON bag.id_bag_type = bag_type.id_bag_type
				INNER JOIN bag_model ON bag.id_bag_model = bag_model.id_bag_model WHERE MONTH(date) = $month";
				$query3 	= mysqli_query($conn, $sql3);

				while ($data3 = mysqli_fetch_array($query3)) {
					$price = number_format($data3['bag_price'], 2, ',', '.');
					$total = number_format($data3['total'], 2, ',', '.');
			?>
			<tr>
				<td><?= $data3['date'] ?></td>
				<td><?= $data3['bag_type'] ?></td>
				<td><?= $data3['bag_model'] ?></td>
				<td><?= $data3['bag_qty'] ?></td>
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