<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lembaga Penyalur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3>Data Lembaga Penyalur</h3>
                        <hr>
                        <a href="<?php echo e(route('penyalurs.create')); ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        
                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">NAMA LEMBAGA</th>
                                <th scope="col">BIDANG</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">KONTAK</th>
                                <th scope="col" style="width: 20%">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $__empty_1 = true; $__currentLoopData = $penyalurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penyalur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($penyalur->image): ?>
                                            <img src="<?php echo e(asset('images/' . $penyalur->image)); ?>" class="rounded" style="width: 80px">
                                        <?php else: ?>
                                            <span class="text-muted">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($penyalur->nama_lembaga); ?></td>
                                    <td><?php echo e($penyalur->bidang); ?></td>
                                    <td><?php echo e($penyalur->alamat); ?></td>
                                    <td><?php echo e($penyalur->kontak); ?></td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?php echo e(route('penyalurs.destroy', $penyalur->id)); ?>" method="POST">
                                            <a href="<?php echo e(route('penyalurs.edit', $penyalur->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                  <div class="alert alert-danger">
                                      Data Lembaga Penyalur belum Tersedia.
                                  </div>
                              <?php endif; ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\lembaga-penyalur\resources\views/penyalurs/index.blade.php ENDPATH**/ ?>