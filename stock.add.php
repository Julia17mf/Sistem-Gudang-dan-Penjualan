<?php
	session_start();
	if(empty($_SESSION['username'])) {
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
	<form method="POST" action="includes/stock.add.php">
		<table>
			<tr>
				<td>Jenis Barang</td>
				<td>
					<select name="type">
						<?php
							include 'includes/db.php';
							$sql	= "SELECT * FROM type";
							$query 	= mysqli_query($conn, $sql);

							while ($data = mysqli_fetch_array($query)) {
						?>
						<option value="<?= $data['type_code']; ?>"><?= $data['type']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="number" name="qty" min="1"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="number" name="price"></td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
			</tr>
		</table>
	</form>
</body>
</html>