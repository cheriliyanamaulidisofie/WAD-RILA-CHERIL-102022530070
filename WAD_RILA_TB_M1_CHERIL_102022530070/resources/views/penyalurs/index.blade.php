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
                        <a href="{{ route('penyalurs.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif

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
                              @forelse ($penyalurs as $penyalur)
                                <tr>
                                    <td class="text-center">
                                        @if($penyalur->image)
                                            <img src="{{ asset('images/' . $penyalur->image) }}" class="rounded" style="width: 80px">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $penyalur->nama_lembaga }}</td>
                                    <td>{{ $penyalur->bidang }}</td>
                                    <td>{{ $penyalur->alamat }}</td>
                                    <td>{{ $penyalur->kontak }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penyalurs.destroy', $penyalur->id) }}" method="POST">
                                            <a href="{{ route('penyalurs.edit', $penyalur->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Lembaga Penyalur belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>