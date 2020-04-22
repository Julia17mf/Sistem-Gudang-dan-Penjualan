<?php
	include "db.php";

	$y = date("Y");
	$m = date("m");
	$d = date("d");
	$s = "-";

	$date	= $y . $s . $m . $s . $d;

	$sql	= "INSERT INTO sale VALUES (NULL, '$date')";
	$query	= mysqli_query($conn, $sql);

	$sql2	= "SELECT * FROM sale";
	$query2	= mysqli_query($conn, $sql2);

	while ($data = mysqli_fetch_array($query2)) {
		$id_sale	= $data['id_sale'];
	}

	$sql3	= "SELECT * FROM bill";
	$query3	= mysqli_query($conn, $sql3);

	while ($data2 = mysqli_fetch_array($query3)) {
		$id_bag		= $data2['id_bag'];
		$bag_qty	= $data2['bag_qty'];
		$total		= $data2['total'];

		$sql4		= "INSERT INTO sale_report VALUES ('$id_sale', '$id_bag', '$bag_qty', '$total')";
		$query4		= mysqli_query($conn, $sql4);
	}

	if ($query4) {
		$sql5	= "TRUNCATE TABLE bill";
		$query 	= mysqli_query($conn, $sql5);
		header("location: ../cashier.report.php");
	}
?>