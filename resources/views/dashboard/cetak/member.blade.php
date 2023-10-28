<!DOCTYPE html>
<html>
<head>
    <title>Kartu Member</title>
    <style>
        /* CSS untuk mengatur tampilan kartu member */
        .card {
            width: 500px;
            border: 2px solid #140101;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            background-color: salmon;
        }
        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="card">
        <h1>BEAUTY AESTHETIC CLINIC</h1>
        <h2>Kartu Member</h2>
        <p>ID Member: {{ $rekam->id }}</p>
        <p>Nama Member: {{ $rekam->nama }}</p>
        <p>Tanggal Lahir: {{ $rekam->tanggal_lahir }}</p>
        <!-- Anda dapat menampilkan informasi lainnya sesuai kebutuhan Anda -->
    </div>
</body>
</html>
