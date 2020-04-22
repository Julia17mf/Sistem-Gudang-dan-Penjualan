<!DOCTYPE html>
<html>
<head>
	<title>Sistem Guang | Login Page</title>
</head>
<body>
	<div>
		<h1>Login Admin</h1>
		<p>
		<!-- cek pesan notifikasi -->
		<?php
			if(isset($_GET['pesan_admin']))
			{
				if($_GET['pesan_admin'] == "gagal")
				{
					echo "Login gagal! username dan password salah!";
				}
				else if($_GET['pesan_admin'] == "logout")
				{
					echo "Anda telah berhasil logout";
				}
				else if($_GET['pesan_admin'] == "belum_login")
				{
					echo "Anda harus login untuk mengakses halaman admin";
				}
			}
		?>
		</p>
		<form method="POST" action="includes/login.admin.php">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" placeholder="Masukkan username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" placeholder="Masukkan password"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="LOGIN"></td>
				</tr>
			</table>
		</form>
	</div>
	<div>
		<h1>Login User</h1>
		<p>
		<!-- cek pesan notifikasi -->
		<?php
			if(isset($_GET['pesan_user']))
			{
				if($_GET['pesan_user'] == "gagal")
				{
					echo "Login gagal! username dan password salah!";
				}
				else if($_GET['pesan_user'] == "logout")
				{
					echo "Anda telah berhasil logout";
				}
				else if($_GET['pesan_user'] == "belum_login")
				{
					echo "Anda harus login untuk mengakses halaman admin";
				}
			}
		?>
		</p>
		<form method="POST" action="includes/login.user.php">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" placeholder="Masukkan username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" placeholder="Masukkan password"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="LOGIN"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>