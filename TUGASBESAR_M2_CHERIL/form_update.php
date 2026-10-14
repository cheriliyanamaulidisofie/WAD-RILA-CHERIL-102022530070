<?php
include 'connect.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM lembaga_penyalur WHERE id = $id");
$lembaga = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_yayasan = mysqli_real_escape_string($conn, $_POST['nama_yayasan']);
    $alamat_kantor = mysqli_real_escape_string($conn, $_POST['alamat_kantor']);
    $pic_lapangan = mysqli_real_escape_string($conn, $_POST['pic_lapangan']);
    $kontak_pic = mysqli_real_escape_string($conn, $_POST['kontak_pic']);

    $query = "UPDATE lembaga_penyalur SET nama_yayasan='$nama_yayasan', alamat_kantor='$alamat_kantor', pic_lapangan='$pic_lapangan', kontak_pic='$kontak_pic' WHERE id=$id";
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
    <title>Edit Lembaga Penyalur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Edit Profil Lembaga Mitra</h4>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Yayasan / Penerima Manfaat</label>
                            <input type="text" name="nama_yayasan" value="<?= htmlspecialchars($lembaga['nama_yayasan']) ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Kantor Mitra</label>
                            <textarea name="alamat_kantor" class="form-control" rows="3" required><?= htmlspecialchars($lembaga['alamat_kantor']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama PIC Lapangan</label>
                            <input type="text" name="pic_lapangan" value="<?= htmlspecialchars($lembaga['pic_lapangan']) ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kontak PIC (No. HP / WhatsApp)</label>
                            <input type="text" name="kontak_pic" value="<?= htmlspecialchars($lembaga['kontak_pic']) ?>" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>