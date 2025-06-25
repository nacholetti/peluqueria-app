<!DOCTYPE html>
<html>
<head>
    <title>Reservar Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Reservar Turno en la Peluquería</h3>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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
                <input class="peluquero d-none"  id="peluquero_id" name="peluquero_id" value="{{ $peluquero->id }}"></input>
                <div class="mb-3">
                    <label class="form-label">Nombre del cliente:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Servicio:</label>
                    <select name="servicio_id" class="form-select" required>
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}">
                                {{ $servicio->nombre }} - ${{ $servicio->precio }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha:</label>
                    <input type="date" name="fecha" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora:</label>
                    <input type="time" name="hora" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Reservar Turno</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
