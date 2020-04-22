<?php
	include "db.php";

	$month	= $_POST['month'];

	header("location: ../admin.sale.report.php?month=$month");
?>