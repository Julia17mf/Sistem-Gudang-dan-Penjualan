<?php
	include "db.php";

	$month	= $_POST['month'];

	header("location: ../admin.stock.report.php?month=$month");
?>