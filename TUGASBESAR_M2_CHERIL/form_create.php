<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_yayasan = mysqli_real_escape_string($conn, $_POST['nama_yayasan']);
    $alamat_kantor = mysqli_real_escape_string($conn, $_POST['alamat_kantor']);
    $pic_lapangan = mysqli_real_escape_string($conn, $_POST['pic_lapangan']);
    $kontak_pic = mysqli_real_escape_string($conn, $_POST['kontak_pic']);

    $query = "INSERT INTO lembaga_penyalur (nama_yayasan, alamat_kantor, pic_lapangan, kontak_pic) VALUES ('$nama_yayasan', '$alamat_kantor', '$pic_lapangan', '$kontak_pic')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lembaga Penyalur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Tambah Profil Lembaga Mitra</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Yayasan / Penerima Manfaat</label>
                            <input type="text" name="nama_yayasan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Kantor Mitra</label>
                            <textarea name="alamat_kantor" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama PIC Lapangan</label>
                            <input type="text" name="pic_lapangan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kontak PIC (No. HP / WhatsApp)</label>
                            <input type="text" name="kontak_pic" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>