<?php
	include "db.php";

	$id_bag		= $_POST['bag_num'];
	$bag_qty	= $_POST['bag_qty'];

	$sql		= "SELECT * FROM bag WHERE id_bag = '$id_bag'";
	$query		= mysqli_query($conn, $sql);

	while ($data = mysqli_fetch_array($query)) {
		$total		= $bag_qty * $data['bag_price'];
	}	

	$sql2		= "INSERT INTO bill VALUES('$id_bag', '$bag_qty', '$total')";
	$query2		= mysqli_query($conn, $sql2);

	if ($query2) {
		header("location: ../cashier.bill.php");
	}
	else
		echo "Gagal!";
?>