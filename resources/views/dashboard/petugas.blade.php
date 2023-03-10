<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/data.css')}}">
</head>
<body>
    <h2 class="title-table">Laporan Keluhan (Petugas)</h2>
<div style="display: flex; justify-content: center; margin-bottom: 50px">
    <a href="/logout" style="text-align: center">Logout</a> 
    <div style="margin: 0 30px"> | </div>
    <a href="/dashboard" style="text-align: center">Home</a>
</div>

<div style="display: flex; justify-content: flex-end; align-items: center;">
    <form action="" method="GET">
        @csrf
    <input type="text" name="search" placeholder="Cari berdasarkan nama..">
    <a href="/data" class="fas fa-search"></a>
    </form>
    <a href="{{route('data')}}" style="margin-right:30px; margin-left: 20px; margin-top:-20px">Refresh</a>
    {{-- <a href="{{route('export-PDF')}}" style="margin-right:30px; margin-left: 10px; margin-top:-20px">Cetak PDF</a> --}}
</div>

<div style="padding: 0 30px">
    <table>
        <table class="table">
            <thead class="table-dark">
        <thead>
        <tr>
            <th width="5%">No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Pengaduan</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $pengaduan)
            
                @php
                    $no = 1;
                @endphp
       
            <tr>
                <td>{{$no++}}</td>
                <td>{{$pengaduan['nik']}}</td>
                <td>{{$pengaduan['nama']}}</td>
                <td>{{$pengaduan['no']}}</td>
                <td>{{$pengaduan['pengaduan']}}</td> 
                <td>
                    <img src="{{asset('assets/image/'.$pengaduan->foto)}}" width="120">
                </td>
                <td>
                    @if ($pengaduan->response)
                    {{$pengaduan->response['status']}}
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if ($pengaduan->response)
                    {{$pengaduan->response['pesan']}}
                    @else
                    -
                    @endif
                </td>
                <td style="display: flex; justify-content: center;">
                <a href="{{route('response.edit', $pengaduan->id)}}" 
                    class="back-btn">Send Response</a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>