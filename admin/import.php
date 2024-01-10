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
		$customer_id = $row['A']; // Ambil data NIS
		$customer_name = $row['B']; // Ambil data nama
		$customer_phone = $row['C']; // Ambil data jenis kelamin

		// Cek jika semua data tidak diisi
		if($customer_id == "" && $customer_name == "" && $customer_phone == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			// Buat query Insert
			// Prepare and bind the statement

			$sql = $conn->prepare("INSERT INTO customers (customer_id, customer_name, customer_phone) VALUES (?, ?, ?)");
    		$sql->bind_param('sss', $customer_id, $customer_name, $customer_phone);


			// Execute the query
			$sql->execute();
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

header('location: customer.php'); // Redirect ke halaman awal
