<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Jurnal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(80, 112, 255, 0.08);
            border: none;
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #e2e8f0;
            padding: 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            color: #6366f1;
        }
        .card-body {
            padding: 2rem;
        }
        .form-label {
            font-weight: 600;
            color: #475569;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: .75rem 1rem;
        }
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }
        .btn-primary {
            background: #6366f1;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: #4f46e5;
        }
        .btn-warning {
            background: #f59e0b;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }
        .btn-warning:hover {
            background: #d97706;
        }
        .btn-dark {
            background: #0f172a;
            border: none;
        }
        .btn-dark:hover {
            background: #334155;
        } */
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <a href="{{ route('jurnals.index') }}" class="btn btn-dark btn-sm mb-3">&larr; Kembali</a>
                <div class="card shadow-sm">
                    <div class="card-header">
                        TAMBAH DATA JURNAL
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jurnals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Form input untuk nama jurnal -->
                            <div class="mb-3">
                                <label class="form-label">NAMA</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Jurnal">
                            
                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Form input untuk kegiatan jurnal -->
                             <div class="mb-3">
                                <label class="form-label">KEGIATAN</label>
                                <textarea class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan" rows="5" placeholder="Masukkan Kegiatan Jurnal">{{ old('kegiatan') }}</textarea>

                                <!-- error message untuk kegiatan -->
                                @error('kegiatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Form input untuk dokumentasi jurnal -->
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
                            
                            <!-- Form input untuk tanggal jurnal -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TANGGAL</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" placeholder="Masukkan Tanggal Jurnal">

                                        <!-- error message untuk tanggal -->
                                        @error('tanggal')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form input untuk keterangan jurnal -->
                            <div class="mb-3">
                                <label class="form-label">KETERANGAN</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan Jurnal">

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
        CKEDITOR.replace( 'kegiatan' );
    </script>
</body>
</html>