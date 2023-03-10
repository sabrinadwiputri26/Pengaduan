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
    <h2 class="title-table">Laporan Keluhan</h2>
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
    <a href="{{route('data')}}" style="margin-left: 20px; margin-top:-20px">Refresh</a>
    <a href="{{route('export-PDF')}}" style="margin-left: 10px; margin-top:-20px">Cetak PDF</a>
    <a href="{{route('export-excel')}}" style="margin-right:30px; margin-left: 10px; margin-top:-20px">Cetak Excel</a>
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
            <th>Status Response</th>
            <th>Pesan Response</th>
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
                @php
                $no = substr_replace($pengaduan->no, "62", 0, 1);
                @endphp
                
                @php
                if ($pengaduan->response) {
                    $pesanWA = 'Hallo ' . $pengaduan->nama . '! pengaduan anda di ' . $pengaduan->response['status']
                    . 'Berikut pesan untuk anda : ' . $pengaduan->response['pesan'];
                }
                   else {
                    $pesanWA = 'Belum ada data response!';
                   }
                @endphp
                <td><a href="https://wa.me/{{$no}}?text={{$pesanWA}}"
                target="_blank">{{$no}}</a></td>
                
                <td>{{$pengaduan['pengaduan']}}</td>
                <td>
                    <a href="../assets/image/{{$pengaduan->foto}}" target="_blank">
                        <img src="{{asset('assets/image/'.$pengaduan->foto)}}" width="120">
                    </a>
                 </td>

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

                </td>
                <td>
                    <form action="{{route('destroy', $pengaduan->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" style="margin-bottom: 10px">Hapus</button>
                    </form>

                <div>
                    <form action="{{route('created.PDF', $pengaduan->id)}}" method="GET">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button class="btn-delete" style="margin-bottom: 10px">Print</button>
                    </form>
                </div>

                {{-- <div>
                    <form action="{{route('export-excel', $pengaduan->id)}}" method="GET">
                        @csrf
                        <button class="btn-delete" style="margin-bottom: 10px">Cetak Excel</button>
                    </form>
                </div>
                </td> --}}
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>