<?php
include 'connect.php';

$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM lembaga_penyalur 
              WHERE nama_yayasan LIKE '%$search%' OR pic_lapangan LIKE '%$search%' 
              ORDER BY id DESC";
} else {
    $query = "SELECT * FROM lembaga_penyalur ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Lembaga Penyalur - Crowdfunding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="fw-bold mb-4">Modul Lembaga Penyalur (Individu D)</h2>

    <div class="row mb-3">
        <div class="col-md-6">
            <a href="form_create.php" class="btn btn-primary">+ Tambah Lembaga Mitra</a>
        </div>
        <div class="col-md-6">
            <form method="GET" action="index.php" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nama yayasan atau PIC..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Yayasan / Penerima Manfaat</th>
                        <th>Alamat Kantor Mitra</th>
                        <th>PIC Lapangan</th>
                        <th>Kontak PIC</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($row['nama_yayasan']) ?></td>
                            <td><?= htmlspecialchars($row['alamat_kantor']) ?></td>
                            <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['pic_lapangan']) ?></span></td>
                            <td><?= htmlspecialchars($row['kontak_pic']) ?></td>
                            <td class="text-center">
                                <a href="form_update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data lembaga ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">Tidak ada data lembaga penyalur ditemukan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>