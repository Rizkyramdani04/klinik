<!DOCTYPE html>
<html>
<head>
    <title>Cetak Nomor Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div class="card" style="border: 1px solid black">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center">BEAUTY AESTHETIC CLINIC</h5>
            <h6 class="card-subtitle mb-1 text-muted"style="text-align: center">Nomor Antrian</h6>

                <h1 style="text-align: center">{{ $no_antrian }}</h1>
            <div>
                <h6 style="text-align: center">"Terima Kasih Atas Kunjungan Anda"</h6>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
