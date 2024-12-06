<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Pegawai</title>
    <!-- Sertakan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .upload-container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .upload-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="{{ route('pegawai.upload.select') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></a>
                <span class="navbar-brand mx-auto">Upload Foto Pegawai</span>
            </div>
    </nav>
    <div class="container">
        <div class="upload-container mx-auto">
            <h1 class="text-center">Upload Foto untuk {{ $pegawai->nama }}</h1>

            <form action="{{ route('pegawai.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                <div class="form-group">
                    <label for="foto">Pilih Foto:</label>
                    <input type="file" class="form-control-file" name="foto" id="foto" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-file-arrow-up"></i></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sertakan JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
