<?php
$host = "localhost";
$username = "root";
$password = ""; // Default Laragon kosong

// 1. Koneksi ke MySQL server
$conn = mysqli_connect($host, $username, $password);
if (!$conn) {
    die("Koneksi MySQL gagal: " . mysqli_connect_error());
}

// 2. Buat database otomatis
$sql_db = "CREATE DATABASE IF NOT EXISTS db_crowdfunding_d";
mysqli_query($conn, $sql_db);

// 3. Pilih database
mysqli_select_db($conn, "db_crowdfunding_d");

// 4. Buat tabel lembaga_penyalur otomatis
$sql_table = "CREATE TABLE IF NOT EXISTS lembaga_penyalur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_yayasan VARCHAR(255) NOT NULL,
    alamat_kantor TEXT NOT NULL,
    pic_lapangan VARCHAR(150) NOT NULL,
    kontak_pic VARCHAR(50) NOT NULL
)";
mysqli_query($conn, $sql_table);
?>