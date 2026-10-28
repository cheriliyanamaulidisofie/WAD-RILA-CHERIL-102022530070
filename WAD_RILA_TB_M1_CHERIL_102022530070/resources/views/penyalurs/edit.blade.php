<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Lembaga Penyalur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('penyalurs.update', $penyalur->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="font-weight-bold">NAMA LEMBAGA</label>
                                <input type="text" class="form-control @error('nama_lembaga') is-invalid @enderror" name="nama_lembaga" value="{{ old('nama_lembaga', $penyalur->nama_lembaga) }}" placeholder="Masukkan Nama Lembaga">
                            
                                @error('nama_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="font-weight-bold">BIDANG</label>
                                <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang" value="{{ old('bidang', $penyalur->bidang) }}" placeholder="Masukkan Bidang Penyalur">
                            
                                @error('bidang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="font-weight-bold">ALAMAT</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan Alamat Lembaga">{{ old('alamat', $penyalur->alamat) }}</textarea>
                            
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="font-weight-bold">KONTAK</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak', $penyalur->kontak) }}" placeholder="Masukkan Nomor Kontak">
                            
                                @error('kontak')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <a href="{{ route('penyalurs.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>