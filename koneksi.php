<?php
$server   = "localhost";   // gunakan 127.0.0.1, bukan localhost
$username = "root";
$password = "";
$database = "db_event_orginir";
$port     = 3308;          // ubah sesuai hasil dari my.ini

$koneksi = new mysqli($server, $username, $password, $database, $port);

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil!";
}
?>
