
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Aspirasi Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<body>


<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a class="logo">Aspirasi</a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
        @if (Auth::check())
        @if (Auth::user()->role === 'admin')
        <a href="{{route('data')}}" class= "login-btn">Lihat data></a>
        @elseif (Auth::user()->role == 'petugas')
        <a href="{{route('data.petugas')}}"
        class="login-btn">Lihat data</a>
        @endif
        
        @else
     
        <a href="/login"class="fas fa-user"></a>
        @endif
    </div>

</header>
<section class="home" id="home" style="background:url({{asset('assets/img/bogor.png')}}) no-repeat;">
    {{-- <img src="{{asset('assets/img/bogor.png')}}" alt=""> --}}
</section> 


<section class="about" id="about">

    @csrf 
    <h1 class="heading"> <span> Pengaduan </span> Masyarakat </h1>
    <div class="row">

        <div class="video-container">
            <video src="{{asset('assets/img/about.mp4')}}" loop autoplay muted></video>
        </div>
        <div class="content">
            <h3>Layanan dan Pengaduan</h3>
            <p>Sarana aspirasi dan pengaduan online ini mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu, jadi terhubung dengan seluruh instansi pemerintahan baik di pusat maupun daerah. Jadi Jangan khawatir ya!!</p>
            <p>Disini kalian juga dapat menyampaikan aspirasi, keluhan, atau pengaduan langsung kepada kami. Kami akan selalu berkomitmen untuk menindaklanjuti aspirasi yang kalian sampaikan</p>
            <a target="_blank" href="https://lan.go.id/?p=2532" class="btn">Baca selengkapnya</a>
        </div>
    </div>

</section>

<section class="icons-container">

    <div class="icons">
        <img src="{{asset('assets/img/icon-1.png')}}" alt="">
        <div class="info">
            <h3>Jumlah Camat</h3>
            <span>15</span>
        </div>
    </div>

    <div class="icons">
        <img src="{{asset('assets/img/icon-2.png')}}" alt="">
        <div class="info">
            <h3>Jumlah Desa</h3>
            <span>42</span>
        </div>
    </div>

    <div class="icons">
        <img src="{{asset('assets/img/icon-3.png')}}" alt="">
        <div class="info">
            <h3>Jumlah Penduduk</h3>
            <span>12.000</span>
        </div>
    </div>

    <div class="icons">
        <img src="{{asset('assets/img/icon-4.png')}}" alt="">
        <div class="info">
            <h3>Data Pertahun</h3>
            <span>2023</span>
        </div>
    </div>
   
</section>

<section class="contact" id="contact">
    <h1 class="heading"> <span> Form </span> Pengaduan </h1>
    <div class="row">

        <form action="/store" method="POST" enctype="multipart/form-data"> 
            @csrf  
    
            @if ($errors->any())
            <div class="alert alert-danger;">
            <ul>
              @foreach ($errors->all() as $error)
                  <li> {{$error}} </li>
              @endforeach  
            </ul>
            </div>

            @endif
            {{-- @if (Session::get('seccess'))
            <div style="width: 100%; background: green; padding:10px">
            {{ Session::get('succes')}}
            </div>
            @endif     
            </div>     --}}
          
            <input type="text" placeholder="nik" class="box" name="nik">
            <input type="name" placeholder="nama" class="box" name="nama">
            <input type="no" placeholder="no.telphone" class="box" name="no">
            <textarea class="box" name="pengaduan" placeholder="pengaduan" id="" cols="30" rows="10"></textarea>
            <div class="box">
                <label>Foto</label>
                <input type="file" class="input" name="foto">
             </div> 
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="{{asset('assets/img/Form.png')}}" alt="">
        </div>
    </div>

    <h1 class="heading"> <span> Data </span> Pengaduan </h1>
    <div class="icons-container">
        {{-- <h2>Laporan Pengaduan</h2> --}}
        @foreach ($pengaduan as $pg)
        <p>{{$pg['created_at']}} :  {{$pg['nama']}}</p>
        <div class="icons">
            <div class="text">
            {{$pg['pengaduan']}}
            </div>
            <div>
                <img src="{{asset('assets/image/'.$pg->foto)}}" alt="">
            </div>

        @endforeach

        <div style="display: flex; justify-content: flex-end;
        margin-top: 10px">
        {!! $pengaduan->links() !!}
    </div>
            </div>
        </div>
    </div>
</section>
</section>
