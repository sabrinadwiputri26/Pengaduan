<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak data pengaduan</title>
</head>
<body>
    <h2 style="text-align: center; margin-bottom: 20px">Data Keseluruhan Pengaduan</h2>
    <table style="width: 100px"></table>
    <table>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Tanggal</th>
            <th>Pengaduan</th>
            <th>Gambar</th>
            <th>Status Response</th>
            <th>Pesan Response</th>
        </tr>
        @php $no = 1;   
        @endphp
    @foreach ($pengaduans as $pengaduan)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$pengaduan['nik']}}</td>
        <td>{{$pengaduan['nama']}}</td>
        <td>{{$pengaduan['no']}}</td>
        <td>{{\Carbon\Carbon::parse($pengaduan['created_at'])->format('j F, Y')}}</td>
        <td>{{$pengaduan['pengaduan']}}</td>
        <td><img src="assets/image/{{$pengaduan['foto']}}" width="80" alt=""></td>
    </td>
    <td>
        @if ($pengaduan['response'])
        {{$pengaduan['response']['status']}}
        @else
        -
        @endif
    </td>
    <td>
        @if ($pengaduan['response'])
        {{$pengaduan['response']['pesan']}}
        @else
        -
        @endif
    </td>
    </tr>
    @endforeach
    </table>
</body>
</html>