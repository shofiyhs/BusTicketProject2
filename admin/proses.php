<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_customers.xls");
?>

<h3>Data Customer</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Name</th>
		<th>Contact</th>

	</tr>
	<?php
	// Load file koneksi.php
	include "config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($conn, "SELECT * FROM customers");
	
	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['customer_id']."</td>";
		echo "<td>".$data['customer_name']."</td>";
		echo "<td>".$data['customer_phone']."</td>";
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>
