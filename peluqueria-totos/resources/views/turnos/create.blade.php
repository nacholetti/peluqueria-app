<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar Turno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background-color: #1e293b;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        .card-header {
            background-color: #38bdf8;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            text-align: center;
        }

        .card-header h3 {
            margin: 0;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
            color: #f8fafc;
        }

        .form-control,
        .form-select {
            background-color: #0f172a;
            color: #f8fafc;
            border: 1px solid #334155;
            border-radius: 0.5rem;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .btn-success {
            background-color: #22c55e;
            border: none;
            font-weight: bold;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #16a34a;
        }

        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="py-4">
    <div class="container">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header text-white">
                <h3>Reservar Turno</h3>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('turnos.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="peluquero_id" value="{{ $peluquero->id }}">

                    <div class="mb-3">
                        <label class="form-label">Nombre del cliente</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" placeholder="Ej: 11 1234 5678" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Servicio</label>
                        <select name="servicio_id" class="form-select" required>
                            @foreach($servicios as $servicio)
                                <option value="{{ $servicio->id }}">
                                    {{ $servicio->nombre }} - ${{ $servicio->precio }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hora</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Reservar Turno</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
