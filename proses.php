
<form action=" " method="POST" enctype="multipart/form-data">
	<p>Nama : <input type="text" name="nama"></p>
	<p>Input Gambar : <input type="file" name="file"></p>
	<table>
	<tr>
		<td>Hobi : </td>
		<td>Genre film : </td>
		<td>Tujuan Travelling : </td>
	</tr>
	<tr><td><input type="checkbox" name="hobi[]" value="Futsal">Futsal<br>
			<input type="checkbox" name="hobi[]" value="Tennis">Tennis<br>
			<input type="checkbox" name="hobi[]" value="Mancing">Mancing<br>
			<input type="checkbox" name="hobi[]" value="Nongkrong">Nongkrong<br>
			<input type="checkbox" name="hobi[]" value="Badminton">Badminton<br>
			<input type="checkbox" name="hobi[]" value="Ngoding">Ngoding<br>
		</td>
		<td><input type="checkbox" name="genre[]" value="Horror">Horror<br>
			<input type="checkbox" name="genre[]" value="Action">Action<br>
			<input type="checkbox" name="genre[]" value="Thriller">Thriller<br>
			<input type="checkbox" name="genre[]" value="Anime">Anime<br>
			<input type="checkbox" name="genre[]" value="Animasi">Animasi<br>
		</td>
		<td><input type="checkbox" name="travel[]" value="Bali">Bali<br>
			<input type="checkbox" name="travel[]" value="Raja Ampat">Raja Ampat<br>
			<input type="checkbox" name="travel[]" value="Pulau Derawan">Pulau Derawan<br>
			<input type="checkbox" name="travel[]" value="Bangka Belitung">Bangka Belitung<br>
			<input type="checkbox" name="travel[]" value="Labuan Bajo">Labuan Bajo<br>
		</td>
	</tr>
	</table>
	<input type="submit" name="kirim" value="Kirim">
</form>
<?php
	if (isset($_POST['kirim'])) {
		# code...
		$nama=$_POST['nama'];
		//$file=$_FILES['file'];
		$hobi=$_POST['hobi'];
		$genre=$_POST['genre'];
		$travel=$_POST['travel'];
		//$tujuan=$_POST['travel'];

		$namaFile = $_FILES['file']['name'];
		$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
		$dirUpload = "gambar/";

// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		echo "<table><tr><td>Nama</td><td>$nama</td></tr>";
		echo "<tr><td>Gambar</td><td>";

		if ($terupload) {
		    echo "<img src='".$dirUpload.$namaFile."' width=200 height=200>";
		} else {
		    echo "Upload Gagal!";
		}

		echo "</td></tr>";
		echo "<tr><td colspan='2'>";
		echo "<table><tr><td>Hobi </td><td>Genre Film </td><td>Tujuan Travelling </td></tr>";
		echo "<tr><td>";
		if ($hobi=='') {
			echo " ";
		}else{
			for ($i=0; $i <count($hobi) ; $i++) { 
				echo "<li>".$hobi[$i]."<br>";
			}}
		echo " </td>";
		echo "<td>";
		if ($genre=='') {
			echo " ";
		}else{
		for ($j=0; $j <count($genre) ; $j++) { 
			echo "<li>".$genre[$j]."<br>";
		}}
		echo " </td>";
		echo "<td>";
		if ($travel=='') {
			echo " ";
		}else{for ($k=0; $k <count($travel) ; $k++) { 
			echo "<li>".$travel[$k]."<br>";
		}}
		echo " </td></tr></table></td></tr>";
		echo "</table>";
		//echo "string";
	}
?>
<form>
	<button value="<?php unset($hobi,$genre,$travel);  ?>">Delete</button>
</form>