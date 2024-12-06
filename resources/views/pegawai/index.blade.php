<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            <span class="navbar-brand mx-auto">Data Pegawai</span>
        </div>
    </nav>

    <div class="container mt-5">
        @if ($pegawais->isEmpty())
            <p>Tidak ada pegawai yang ditemukan.</p>
        @else
            <div class="container mt-5">
                <h1 class="mb-3 text-center">DATA PEGAWAI</h1>
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-4"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div>
                        <a href="{{ route('export', ['ids' => [1, 2, 3]]) }}" class="btn btn-primary">
                        <i class="fa fa-download"></i></a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="table-blue">
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle" width="10%">Foto</th>
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
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $index => $pegawai)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($pegawai->foto)
                                        <img src="{{ asset('images/' . $pegawai->foto) }}" alt="Foto Pegawai" width="100">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td align="center">{{ $pegawai->nip }}</td>
                                <td align="center">{{ $pegawai->nama }}</td>
                                <td align="center">{{ $pegawai->tempat_lahir }}</td>
                                <td align="center">{{ $pegawai->alamat }}</td>
                                <td align="center">{{ \Carbon\Carbon::parse($pegawai->tgl_lahir)->format('d-m-Y') }}</td>
                                <td align="center">{{ $pegawai->jenis_kelamin }}</td>
                                <td align="center">{{ $pegawai->golongan }}</td>
                                <td align="center">{{ $pegawai->eselon }}</td>
                                <td align="center">{{ $pegawai->jabatan }}</td>
                                <td align="center">{{ $pegawai->tempat_tugas }}</td>
                                <td align="center">{{ $pegawai->agama }}</td>
                                <td align="center">{{ $pegawai->unit_kerja }}</td>
                                <td align="center">{{ $pegawai->no_hp }}</td>
                                <td align="center">{{ $pegawai->npwp }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#unit_kerja').select2({
            placeholder: "Pilih Unit Kerja",
            ajax: {
                url: "{{ route('get.units') }}", // Route untuk mengambil data unit kerja
                type: "GET",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // Kata kunci pencarian
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.nama
                            };
                        })
                    };
                },
                cache: true
            }
        });
    });
</script> -->

</body>
</html>
