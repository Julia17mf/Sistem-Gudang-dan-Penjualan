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
	<form method="POST" action="includes/admin.stock.report.php">
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
				<td>Jenis Barang</td>
				<td>Jumlah</td>
				<td>Harga</td>
				<td>Total</td>
				<td>Tanggal</td>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql3	= "SELECT * FROM stock_report
			INNER JOIN type ON stock_report.type_code = type.type_code WHERE MONTH(date) = $month";
			$query3 	= mysqli_query($conn, $sql3);

			while ($data3 = mysqli_fetch_array($query3)) {
		?>
			<tr>
				<td><?= $data3['type']; ?></td>
				<td><?= $data3['qty']; ?></td>
				<td><?= $data3['price']; ?></td>
				<td><?= $data3['total']; ?></td>
				<td><?= $data3['date']; ?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
</body>
</html>