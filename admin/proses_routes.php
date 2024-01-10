<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_routes.xls");
?>

<h3>Data Routes</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Via Cities</th>
		<th>Bus</th>
		<th>Derpature Date</th>
		<th>Derpature Time</th>
		<th>Cost</th>

	</tr>
	<?php
	// Load file koneksi.php
	include "config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($conn, "SELECT * FROM routes");
	
	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['route_id']."</td>";
		echo "<td>".$data['route_cities']."</td>";
		echo "<td>".$data['bus_no']."</td>";
		echo "<td>".$data['route_dep_date']."</td>";
		echo "<td>".$data['route_dep_time']."</td>";
		echo "<td>".$data['route_step_cost']."</td>";

		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>
