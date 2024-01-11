<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Bus.xls");
?>

<h3>Data Bus</h3>
		
<table border="1" cellpadding="2">
	<tr>
		<th>Number</th>
		<th>Bus Number</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($conn, "SELECT * FROM buses");
	
	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['bus_no']."</td>";
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>
