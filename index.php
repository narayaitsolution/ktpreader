<?php
include 'config.php';

// Ambil data dari URL parameter (jika ada)
$extractedData = [
    'nik' => $_GET['nik'] ?? '',
    'nama_lengkap' => $_GET['nama_lengkap'] ?? '',
    'alamat' => $_GET['alamat'] ?? '',
    'tempat_tanggal_lahir' => $_GET['tempat_tanggal_lahir'] ?? '',
    'jenis_kelamin' => $_GET['jenis_kelamin'] ?? '',
    'agama' => $_GET['agama'] ?? '',
    'status_perkawinan' => $_GET['status_perkawinan'] ?? '',
    'pekerjaan' => $_GET['pekerjaan'] ?? '',
    'kewarganegaraan' => $_GET['kewarganegaraan'] ?? ''
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstraksi KTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Ekstraksi Informasi KTP</h2>
        <div class="card">
            <div class="card-body">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ktpImage" class="form-label">Ambil Foto KTP</label>
                        <input type="file" class="form-control" id="ktpImage" name="ktpImage" accept="image/*" capture="camera">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Upload dan Ekstraksi</button>
                </form>
                <hr>
                <h4 class="text-center">Hasil Ekstraksi</h4>
                <form action="save.php" method="POST">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($extractedData['nik']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo htmlspecialchars($extractedData['nama_lengkap']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?php echo htmlspecialchars($extractedData['alamat']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_tanggal_lahir" class="form-label">Tempat/Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="<?php echo htmlspecialchars($extractedData['tempat_tanggal_lahir']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo htmlspecialchars($extractedData['jenis_kelamin']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="<?php echo htmlspecialchars($extractedData['agama']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" value="<?php echo htmlspecialchars($extractedData['status_perkawinan']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo htmlspecialchars($extractedData['pekerjaan']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?php echo htmlspecialchars($extractedData['kewarganegaraan']); ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>