<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Jurnal</title>
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
        }
        .product-image {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(99,102,241,0.10);
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <a href="{{ route('jurnals.index') }}" class="btn btn-dark back-btn">&larr; Kembali</a>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded mb-3 mb-md-0">
                            <div class="card-body">
                                <img src="{{ asset('/storage/jurnals/'.$jurnal->dokumentasi) }}" class="product-image">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <h3>{{ $jurnal->name }}</h3>
                                <hr/>
                                <div class="mb-3">
                                    {!! $jurnal->kegiatan !!}
                                </div>
                                <hr/>
                                <p>Tanggal : <span class="fw-semibold">{{ $jurnal->tanggal }}</span></p>
                                <p>Keterangan : <span class="fw-semibold">{{ $jurnal->keterangan }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>