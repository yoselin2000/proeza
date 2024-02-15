<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="col-12 p-0 m-0">
        <div class="row">
            <div class="qr-code-container">
                {{--  {!! QrCode::size(200)->generate('http://192.168.88.243:8000/qrs/informacion/' . $elementComponent->id) !!}  --}}
                {!! QrCode::size(200)->generate(url('/qrs/informacion/' . $elementComponent->id)) !!}
            </div>
        </div>
    </div>
</body>
</html>
