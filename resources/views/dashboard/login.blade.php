
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{--   
   <form action="{{route('auth')}}" method="post" class="card ms-auto mx-auto" style="width: 18rem"></form>
@csrf --}}
  <title>login pengaduan web</title>
</head>
<body>
  
</body>
</html>
    
<section class="ftco-section">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="wrap d-md-flex">
            {{-- <div class="col-md-12 col-lg-10"> --}}
                <div class="img">
                    <img src="{{ asset('assets/img/loginn.png')}}" alt="">
                </div>

                    <div class="login-wrap p-4 p-md-5">
                  <div class="d-flex">
                      <div class="w-100">
                          <h3 class="mb-4">Welcome to Pengaduan Login</h3>
                      @if ($errors->any())
                      <div class="alert alert-danger;">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach  
                      </ul>
                  </div>
                       @endif
                  <form action="{{route('auth')}}" method="POST" class="signin-form">
                            @csrf 
                      <div class="form-group mb-3">
                          <label class="label" for="name">Masukan Email</label>
                          <input type="text" class="form-control" placeholder="email" name="email" required>
                      </div>
                <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                </div>
              
              </form>
              <p class="text-center">Back to home?<a data-toggle="tab" href="/dashboard">click</a></p>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="{{ url('assets/js/script.js') }}"></script>
      
</body>
</html>

