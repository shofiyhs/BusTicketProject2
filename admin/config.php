<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'sbtbsphp'; // Nama databasenya

// Koneksi ke MySQL dengan mysqli
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}

// Now $con can be used for your mysqli queries.
?>