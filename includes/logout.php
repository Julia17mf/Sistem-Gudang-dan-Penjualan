<?php
	session_start();	//mengaktifkan session
	session_destroy();	//menghapus semua session

	//mengalihkan halaman sambil mengirim pesan input
	header("location:../index.php?pesan=logout");
?>