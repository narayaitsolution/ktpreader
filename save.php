<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $tempat_tanggal_lahir = $_POST['tempat_tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $pekerjaan = $_POST['pekerjaan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];

    $query = "INSERT INTO ktp_data (nik, nama_lengkap, alamat, tempat_tanggal_lahir, jenis_kelamin, agama, status_perkawinan, pekerjaan, kewarganegaraan)
              VALUES ('$nik', '$nama_lengkap', '$alamat', '$tempat_tanggal_lahir', '$jenis_kelamin', '$agama', '$status_perkawinan', '$pekerjaan', '$kewarganegaraan')";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
