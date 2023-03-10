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
    <form action="{{route('response.update', $pengaduanId)}}" method="POST"
    style="width: 500px; margin:50px auto; display:block;">
    @csrf
    @method('PATCH')
    <div class="input-card">
        <label for="status">Status :</label>
        @if ($pengaduan)
        <select name="status" id="status">
            <option selected hidden disabled>Pilih Status</option>
            <option value="ditolak" {{$pengaduan['status'] == 'ditolak' ? 'selected' : '' }}>ditolak</option>
            <option value="proses" {{$pengaduan['status'] == 'proses' ? 'selected' : '' }}>proses</option>
            <option value="diterima" {{$pengaduan['status'] == 'diterima' ? 'selected' : '' }}>diterima</option>
        </select>
       @else
        <select name="status" id="status">
            <option selected hidden disabled>Pilih Status</option>
            <option value="ditolak">ditolak</option>
            <option value="proses">proses</option>
            <option value="diterima">diterima</option>
        </select>
        @endif
    </div>
    <div class="input-card">
        <label for="pesan">Pesan :</label>
        <textarea name="pesan" id="pesan" rows="3">{{$pengaduan ? $pengaduan['pesan'] : ''}}</textarea>
    </div>
    <button type="submit">Kirim Response</button>
    </form>
</body>