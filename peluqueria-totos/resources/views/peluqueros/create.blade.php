<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Elegí tu peluquero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.8rem;
            color: #38bdf8;
            font-weight: bold;
        }

        .peluquero-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #38bdf8;
            margin-top: -40px;
            background-color: #fff;
        }

        .card {
            background-color: #1e293b;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            padding-top: 2.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-title {
            font-size: 1.2rem;
            color: #f8fafc;
        }

        .btn-primary {
            background-color: #38bdf8;
            border: none;
            font-weight: bold;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0ea5e9;
        }

        .alert-success {
            background-color: #16a34a;
            border: none;
            text-align: center;
        }

        @media (max-width: 576px) {
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Elegí tu peluquero</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            @foreach($peluqueros as $peluquero)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 100%; max-width: 300px;">
                        <img src="{{ asset('storage/' . $peluquero->foto) }}" class="peluquero-img" alt="Foto de {{ $peluquero->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $peluquero->nombre }}</h5>
                            <a href="{{ route('turnos.createConPeluquero', $peluquero->id) }}" class="btn btn-primary mt-2">Elegir este peluquero</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
