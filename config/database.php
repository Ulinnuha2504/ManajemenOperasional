<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "monitoring_pengajuan";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn) {
    echo "✅ Koneksi berhasil";
} else {
    die("❌ Koneksi gagal: " . mysqli_connect_error());
}
?>