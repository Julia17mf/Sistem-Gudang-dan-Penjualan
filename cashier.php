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
		<a href="index.user.php">Home</a> | 
		<a href="cashier.php">Cashier</a> | 
		<a href="cashier.bill.php">Bill</a> | 
		<a href="cashier.report.php">Report</a>
	</nav>
	<table border="1">
		<thead>
			<tr>
				<td>No.</td>
				<td>Jenis</td>
				<td>Model</td>
				<td>Harga</td>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'includes/db.php';

				$sql	= "SELECT * FROM bag
				INNER JOIN bag_type ON bag.id_bag_type = bag_type.id_bag_type
				INNER JOIN bag_model ON bag.id_bag_model = bag_model.id_bag_model";
				$query 	= mysqli_query($conn, $sql);

				while ($data = mysqli_fetch_array($query)) {
					$price = number_format($data['bag_price'], 2, ',', '.');
			?>
			<tr>
				<td><?= $data['id_bag'] ?></td>
				<td><?= $data['bag_type'] ?></td>
				<td><?= $data['bag_model'] ?></td>
				<td>Rp <?= $price ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<form method="POST" action="includes/cashier.bill.php">
		<table>
			<tr>
				<td>Pilih Nomor Tas</td>
				<td>
					<select name="bag_num">
						<?php
							$sql2	= "SELECT * FROM bag";
							$query2	= mysqli_query($conn, $sql2);
							while ($option = mysqli_fetch_array($query2)) {
						?>
						<option value="<?= $option['id_bag'] ?>"><?= $option['id_bag'] ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="number" name="bag_qty" min="1"></td>
			</tr>
			<tr>
				<td><button type="submit">Beli</button></td>
			</tr>
		</table>
	</form>
</body>
</html>