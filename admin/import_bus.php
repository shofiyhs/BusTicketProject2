<?php
// Load file koneksi.php
include "config.php";

// Load file autoload.php
require '../admin/vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
    $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id = $row['A']; // Ambil data NIS
		$busno = $row['B']; // Ambil data nama
		// $customer_phone = $row['C']; // Ambil data jenis kelamin

		// Cek jika semua data tidak diisi
		if($id == "" && $busno == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			// Buat query Insert
			// Prepare and bind the statement

			$sql = $conn->prepare("INSERT INTO buses (id, busno) VALUES (?, ?)");
			
			if (!$sql) {
				die("Persiapan gagal: " . $conn->error);
			}
			$sql->bind_param('ss', $id, $busno);

			// Execute the query
			$sql->execute();
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

header('location: bus.php'); // Redirect ke halaman awal
