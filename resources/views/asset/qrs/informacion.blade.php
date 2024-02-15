<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-12">
            <dt class="row justify-content-center">DATOS DEL ARTICULO</dt>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-md-4">Marca</dt>
                                <dd class="col-md-8">{{ $elementComponent->brand }}</dd>
                                <dt class="col-md-4">Modelo</dt>
                                <dd class="col-md-8">{{ $elementComponent->model}}</dd>
                                <dt class="col-md-4">SN</dt>
                                <dd class="col-md-8">{{ $elementComponent->SN}}</dd>
                                <dt class="col-md-4">Descripcion</dt>
                                <dd class="col-md-8">{{ $elementComponent->description}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
