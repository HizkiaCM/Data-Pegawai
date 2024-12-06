<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai Berdasarkan Unit Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            <span class="navbar-brand mx-auto">Daftar Pegawai Berdasarkan Unit Kerja</span>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Data Pegawai</h1>
        
        <form action="{{ route('pegawai.showByUnitKerja') }}" method="GET">
        <div class="mb-3">
            <label for="unit_kerja" class="form-label">Unit Kerja</label>
            <select class="form-control" id="unit_kerja" name="unit_kerja" onchange="this.form.submit()">
                <option value="">Pilih Unit Kerja</option>
                @foreach($unitKerjas as $unit)
                    <option value="{{ $unit }}" {{ $unitKerjaDipilih == $unit ? 'selected' : '' }}>
                        {{ $unit }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                        <th class="text-center align-middle">NIP</th>
                        <th class="text-center align-middle">Nama</th>
                        <th class="text-center align-middle">Tempat Lahir</th>
                        <th class="text-center align-middle">Alamat</th>
                        <th class="text-center align-middle">Tgl Lahir</th>
                        <th class="text-center align-middle">L/P</th>
                        <th class="text-center align-middle">Gol</th>
                        <th class="text-center align-middle">Eselon</th>
                        <th class="text-center align-middle">Jabatan</th>
                        <th class="text-center align-middle">Tempat Tugas</th>
                        <th class="text-center align-middle">Agama</th>
                        <th class="text-center align-middle">Unit Kerja</th>
                        <th class="text-center align-middle">No. HP</th>
                        <th class="text-center align-middle">NPWP</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $peg)
                    <tr>
                        <td>{{ $peg->nip }}</td>
                        <td>{{ $peg->nama }}</td>
                        <td>{{ $peg->tempat_lahir }}</td>
                        <td>{{ $peg->alamat }}</td>
                        <td>{{ $peg->tgl_lahir }}</td>
                        <td>{{ $peg->jenis_kelamin }}</td>
                        <td>{{ $peg->golongan }}</td>
                        <td>{{ $peg->eselon }}</td>
                        <td>{{ $peg->jabatan }}</td>
                        <td>{{ $peg->tempat_tugas }}</td>
                        <td>{{ $peg->agama }}</td>
                        <td>{{ $peg->unit_kerja }}</td>
                        <td>{{ $peg->no_hp }}</td>
                        <td>{{ $peg->npwp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
