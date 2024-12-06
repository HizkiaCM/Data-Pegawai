<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #343a40;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        li a {
            display: block;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        li a:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
            <span class="navbar-brand mx-auto">Data Pegawai</span>
        </div>
    </nav>
    <div class="container mt-4 pt-4">
        <h1>Pilih Pegawai untuk Upload Foto</h1>
        <ul>
            @foreach ($pegawais as $pegawai)
                <li>
                    <a href="{{ route('pegawai.upload.form', $pegawai->id) }}">{{ $pegawai->nama }}</a>
                </li>
            @endforeach
        </ul>
        <div class="text-center">
        <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i></a>
    </div>
</body>
</html>
