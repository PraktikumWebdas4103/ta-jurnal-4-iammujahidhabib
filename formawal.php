<form method="POST">
	<p>Username : <input type="text" name="username"></p>
	<p>Password : <input type="password" name="password"></p>
	<input type="submit" name="kirim" value="Kirim">
</form>
<?php
if (isset($_POST['kirim'])) {
	$username='admin';
	$password='admin';
		if ($_POST['username'] == $username && $_POST['password'] == $password) {
			echo "Anda berhasil Login";
			echo "<a href='proses.php'>proses</a>";

		}
		else
			echo "Username atau Password salah!";
	}
?>