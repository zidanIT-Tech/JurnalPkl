<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Jurnal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(80, 112, 255, 0.08);
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                <div>
                    <h3 class="text-center my-4 fw-bold">Data Jurnal PKL Zidan </h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('jurnals.create') }}" class="btn btn-md btn-primary mb-3 shadow">Tambah</a>
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">NAMA</th>
                                    <th scope="col">KEGIATAN</th>
                                    <th scope="col">DOKUMENTASI</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col" style="width: 20%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jurnals as $jurnal)
                                <tr class="text-center">
                                    <td>{{ $jurnal->name }}</td>
                                    <td>{{ strip_tags($jurnal->kegiatan) }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/jurnals/'.$jurnal->dokumentasi) }}" class="rounded shadow-sm" style="width: 120px; height: 80px; object-fit:cover;">
                                    </td>
                                    <td>{{ $jurnal->tanggal }}</td>
                                    <td>{{ $jurnal->keterangan }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jurnals.destroy', $jurnal->id) }}" method="POST" style="display:inline-block">
                                            <a href="{{ route('jurnals.show', $jurnal->id) }}" class="btn btn-sm btn-dark mb-1">DETAIL</a>
                                            <a href="{{ route('jurnals.edit', $jurnal->id) }}" class="btn btn-sm btn-warning mb-1">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mb-1">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center">
                                            Data Jurnals belum ada.
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $jurnals->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>