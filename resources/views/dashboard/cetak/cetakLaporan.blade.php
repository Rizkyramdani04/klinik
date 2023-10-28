{{-- @extends('dashboard.layouts.main')

@section('container')

                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead class="thead-dark">
                            <tr style="text-align: center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Lahir</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomer Telepon</th>
                                <th>Layanan</th>
                                <th>Tanggal Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekams as $rekam)
                                <tr style="text-align: center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rekam->nama }}</td>
                                    <td>{{ $rekam->alamat }}</td>
                                    <td>{{ $rekam->tanggal_lahir }}</td>
                                    <td>{{ $rekam->nik }}</td>
                                    <td>{{ $rekam->jenis_kelamin }}</td>
                                    <td>{{ $rekam->telepon }}</td>
                                    <td>{{ $rekam->layanan }}</td>
                                    <td>{{ $rekam->tanggal_kunjungan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<html>
<head>
  <title>Laporan Data Kunjungan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Laporan Data Pasien</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="table_id">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Lahir</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomer Telepon</th>
                            <th>Layanan</th>
                            <th>Tanggal Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rekams as $rekam)
                            <tr style="text-align: center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rekam->nama }}</td>
                                <td>{{ $rekam->alamat }}</td>
                                <td>{{ $rekam->tanggal_lahir }}</td>
                                <td>{{ $rekam->nik }}</td>
                                <td>{{ $rekam->jenis_kelamin }}</td>
                                <td>{{ $rekam->telepon }}</td>
                                <td>{{ $rekam->layanan }}</td>
                                <td>{{ $rekam->tanggal_kunjungan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a href="/dashboard/laporan" class="btn btn-warning">Kembali</a>
</div>

<script>
$(document).ready(function() {
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>
