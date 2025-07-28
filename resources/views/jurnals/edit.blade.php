<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Jurnal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(80, 112, 255, 0.08);
            border: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('jurnals.index') }}" class="btn btn-dark btn-sm mb-3">&larr; Kembali</a>
                <div class="card shadow-sm">
                    <div class="card-header">
                        EDIT JURNAL
                    </div>
                    <div class="card-body">

                        <form action="{{ route('jurnals.update', $jurnal->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">NAMA</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $jurnal->name) }}" placeholder="Masukkan Nama Jurnal">

                                <!-- error message untuk name -->
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">KEGIATAN</label>
                                <textarea class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" rows="5" placeholder="Masukkan Kegiatan">{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>

                                <!-- error message untuk kegiatan -->
                                @error('kegiatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">DOKUMENTASI</label>
                                <input type="file" class="form-control @error('dokumentasi') is-invalid @enderror" name="dokumentasi">

                                <!-- error message untuk dokumentasi -->
                                @error('dokumentasi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TANGGAL</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $jurnal->tanggal) }}" placeholder="Masukkan Tanggal Product">

                                        <!-- error message untuk tanggal -->
                                        @error('tanggal')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">kETERANGAN</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan', $jurnal->keterangan) }}" placeholder="Masukkan Keterangan">

                                <!-- error message untuk keterangan -->
                                @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">SIMPAN📌</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('kegiatan');
    </script>
</body>

</html>