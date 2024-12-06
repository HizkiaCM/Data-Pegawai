<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            <span class="navbar-brand mx-auto">Pencarian Data Pegawai</span>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="container mt-5">
            <h1 class="mb-3 text-center">Data Pegawai</h1>
            <form action="{{ route('pegawai.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari pegawai..." value="{{ request()->query('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

                @if($pegawai->isEmpty())
                    <div class="alert alert-info">Tidak ada data pegawai yang ditemukan.</div>
                @else
                    <table class="table table-bordered">
                        <thead class="table-blue">
                            <tr>
                                <th class="text-center-middle">No</th>
                                <th class="text-center-middle">NIP</th>
                                <th class="text-center-middle">Nama</th>
                                <th class="text-center-middle">Tempat Lahir</th>
                                <th class="text-center-middle">Alamat</th>
                                <th class="text-center-middle">Tgl Lahir</th>
                                <th class="text-center-middle">L/P</th>
                                <th class="text-center-middle">Gol</th>
                                <th class="text-center-middle">Eselon</th>
                                <th class="text-center-middle">Jabatan</th>
                                <th class="text-center-middle">Tempat Tugas</th>
                                <th class="text-center-middle">Agama</th>
                                <th class="text-center-middle">Unit Kerja</th>
                                <th class="text-center-middle">No. HP</th>
                                <th class="text-center-middle">NPWP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->golongan }}</td>
                                <td>{{ $data->eselon }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->tempat_tugas }}</td>
                                <td>{{ $data->agama }}</td>
                                <td>{{ $data->unit_kerja }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->npwp }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
        @endif
    </div>
</body>
</html>
