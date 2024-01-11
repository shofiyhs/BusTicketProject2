<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_booking_loba.xls");
?>

<h3>Data Routes</h3>
		
<table border="1" cellpadding="10">
	<tr>
		<th>No</th>
		<th>PNR</th>
		<th>Name</th>
		<th>Contact</th>
		<th>Bus</th>
		<th>Route</th>
		<th>Seat</th>
		<th>Amount</th>
		<th>Derpature</th>
		<th>Booked</th>

	</tr>
	<?php
	// Load file koneksi.php
	include "config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($conn, "SELECT * FROM bookings");
	
	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['booking_id']."</td>";
		echo "<td>".$data['customer_id']."</td>";
		echo "<td>".$data['route_id']."</td>";
		echo "<td>".$data['customer_route']."</td>";
		echo "<td>".$data['booked_seat']."</td>";
		echo "<td>".$data['booked_amount']."</td>";
		echo "<td>".$data['route_dep_date']."</td>";
		echo "<td>".$data['route_dep_time']."</td>";
		echo "<td>".$data['booking_created']."</td>";

		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>