<?php
	include "db.php";

	$y = date("Y");
	$m = date("m");
	$d = date("d");
	$s = "-";

	$date	= $y . $s . $m . $s . $d;

	$type	= $_POST['type'];
	$qty	= $_POST['qty'];
	$price	= $_POST['price'];

	$total	= $qty * $price;

	$read	= "SELECT * FROM stock";
	$find	= mysqli_query($conn, $read);
	$found	= 0;

	while (($scan = mysqli_fetch_array($find)) && ($found == 0)) {
		if ($type == $scan['type_code']) {
			$updateqty		= $qty + $scan['qty'];
			$update 		= "UPDATE stock SET qty = '$updateqty' WHERE type_code = '$type'";
			$updatequery	= mysqli_query($conn, $update);
			$found = 1;
		}
	}

	if ($found == 0) {
		$sql	= "INSERT INTO stock VALUES('NULL', '$type', '$qty')";
		$query 	= mysqli_query($conn, $sql) or die(mysqli_error($conn));
	}

	$sql2		= "INSERT INTO stock_report VALUES('$type', '$qty', '$price', '$total', '$date')";
	$query2 	= mysqli_query($conn, $sql2) or die(mysqli_error($conn));

	if(($query || $updatequery) && $query2) {
		header("location: ../stock.php");
	}
?>