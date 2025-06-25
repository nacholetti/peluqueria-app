<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Peluqueros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .peluquero-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }

        .card {
            align-items: center;
            text-align: center;
        }

        @media (max-width: 576px) {
            .card {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Peluqueros</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        @foreach($peluqueros as $peluquero)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center">
                <div class="card" style="width: 100%; max-width: 300px;">
                    <img src="{{ asset('storage/' . $peluquero->foto) }}" class="peluquero-img" alt="Foto de {{ $peluquero->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $peluquero->nombre }}</h5>
                        <a href="{{ route('turnos.createConPeluquero', $peluquero->id) }}" class="btn btn-primary">Elegir este peluquero</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>