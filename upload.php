<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['ktpImage']) && $_FILES['ktpImage']['error'] == UPLOAD_ERR_OK) {
        // Pindahkan file yang diunggah ke folder uploads
        $imagePath = 'uploads/' . basename($_FILES['ktpImage']['name']);
        move_uploaded_file($_FILES['ktpImage']['tmp_name'], $imagePath);

        // Jalankan perintah Tesseract untuk membaca teks dari gambar
        $command = "\"C:\\Users\\johanericka\\AppData\\Local\\Programs\\Tesseract-OCR\\tesseract.exe\" " . escapeshellarg($imagePath) . " stdout";
        $output = shell_exec($command);

        // Ekstrak data dari hasil OCR
        $data = extractKtpData($output);

        if ($data) {
            // Redirect ke index.php dengan hasil ekstraksi data
            $queryString = http_build_query($data);
            header("Location: index.php?$queryString");
            exit();
        } else {
            echo "Gagal membaca data dari KTP.";
        }
    } else {
        echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }
}

// Fungsi untuk mengekstrak data dari hasil OCR
function extractKtpData($text)
{
    // Gunakan regex untuk mengekstrak data KTP
    preg_match('/NIK\s*[:|\s]\s*(\d+)/i', $text, $nikMatch);
    preg_match('/Nama\s*[:|\s]\s*(.+)/i', $text, $namaMatch);
    preg_match('/Alamat\s*[:|\s]\s*(.+)/i', $text, $alamatMatch);
    preg_match('/Tempat\/Tanggal Lahir\s*[:|\s]\s*(.+)/i', $text, $ttlMatch);
    preg_match('/Jenis Kelamin\s*[:|\s]\s*(.+)/i', $text, $genderMatch);
    preg_match('/Agama\s*[:|\s]\s*(.+)/i', $text, $agamaMatch);
    preg_match('/Status Perkawinan\s*[:|\s]\s*(.+)/i', $text, $statusMatch);
    preg_match('/Pekerjaan\s*[:|\s]\s*(.+)/i', $text, $pekerjaanMatch);
    preg_match('/Kewarganegaraan\s*[:|\s]\s*(.+)/i', $text, $kewarganegaraanMatch);

    return [
        'nik' => $nikMatch[1] ?? '',
        'nama_lengkap' => $namaMatch[1] ?? '',
        'alamat' => $alamatMatch[1] ?? '',
        'tempat_tanggal_lahir' => $ttlMatch[1] ?? '',
        'jenis_kelamin' => $genderMatch[1] ?? '',
        'agama' => $agamaMatch[1] ?? '',
        'status_perkawinan' => $statusMatch[1] ?? '',
        'pekerjaan' => $pekerjaanMatch[1] ?? '',
        'kewarganegaraan' => $kewarganegaraanMatch[1] ?? ''
    ];
}
