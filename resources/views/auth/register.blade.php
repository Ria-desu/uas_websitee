<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Laravel - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css')}}/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family:'Poppins';
            background-color: rgb(215, 239, 255); /* Snow white background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            border: 1px solid #ddd; /* Border around the card */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            width: 1000px; /* Form width */
            justify-content: space-between; /* Vertically center content */
            align-items: center;
            margin: calc(50vh - 100px) auto 0; /* Vertikal tengah manual */
            margin: 100px auto 0;
            background-color: rgb(255, 255, 255);
        }

        .card-body {
            padding: 50px;
            display: flex;
            flex-direction: row;
            justify-content: space-between; Vertically center content
            align-items: center;
        }

        .btn-primary {
            transition: background-color 0.3s;
            border-radius: 5px;
            background-color:rgb(105, 152, 184);
            transition: background-color 0.5s;
            border-radius: 50px;
            height:30px;
            width:150px;
            color:rgb(255, 255, 255);
            font-size:15px;
            margin-bottom:20px;
            border-color:transparent;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }

        .form-control {
            border-radius: 10px;
            border-color: #d1d3e2;
            box-shadow: none;
            margin-bottom: 20px; /* Space between inputs */
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .text-center h1 {
            font-weight: 700;
            color: rgb(57, 82, 155); /* Text color adjusted to match the theme */
            font-size: 32px;
            margin-bottom: 20px;
        }

        .small {
            color: #4e73df;
            text-decoration: none;
        }

        .small:hover {
            color: #2e59d9;
        }

        /* .form-group .form-control{
            min-height:25px;
            border-radius:50px;
            width:300px;
            align-items:center;
        } */

        input[type="text"] {
            font-family:'Poppins';
            width: 300px; /* Lebar input */
            padding: 10px; /* Ruang di dalam input */
            font-size: 13px; /* Ukuran teks placeholder */
            border: 1px solid #ccc;
            border-radius: 20px;
        }
        input[type="email"] {
            font-family:'Poppins';
            width: 300px; /* Lebar input */
            padding: 10px; /* Ruang di dalam input */
            font-size: 13px; /* Ukuran teks placeholder */
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        input[type="password"] {
            font-family:'Poppins';
            width: 300px; /* Lebar input */
            padding: 10px; /* Ruang di dalam input */
            font-size: 12px; /* Ukuran teks placeholder */
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        .apaan{
            justify-content: space-between;
            display: flex;
            align-items: center;
        }

        .utama img {
            max-width: 100%;   /* Agar gambar tidak melebihi ukuran wadahnya */
            height: 200px;

        }

        .utama{
            margin-right:200px;
            flex:1;
            text-align:center;
            margin-top:10px;
            margin-left:50px;
        }

        .utama p{
            font-size: 24px;
            font-family:'Poppins';
            color:rgb(57, 82, 155);
            margin-top:10px;
            font-weight: 500 !important;
        }

        .p-5{
            align-items:center;
            text-align:center;
            margin-right:-800px;
        }

        .text-centere{
            margin-top: 1px;
            text-align:center;
            margin-bottom:0px;
        }

        .text-centere a {
            font-weight: 400 !important;
            font-size:13px;
        }

        .btnn{
            font-family:'Poppins';
        }

    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!-- Container diatur untuk flexbox dan mengambil seluruh tinggi layar -->
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="apaan col-lg-12">
                        <div class="utama col-lg-12 d-flex justify-content-center align-items-center bg-light">
                            <p>Selamat Datang</p>
                            
                            <img src="{{ asset('img/logonya.png') }}" alt="logo">
                            <p>Silakan Registrasi</p>

                        </div>
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Akun!</h1>
                            </div>
                            <form action="{{route('register')}}" method="POST" class="user">
                                @csrf
                                <div class="form-group">
                                    <div>
                                        <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName"
                                            placeholder="Nama">

                                            @error('name')
                                            <span class="invalid-feedback" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
        
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail"
                                        placeholder="Alamat Email">

                                        @error('email')
                                            <span class="invalid-feedback" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user form-control-user @error('password_confirmation') is-invalid @enderror"
                                            id="exampleRepeatPassword" placeholder="Ulangi Password">

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btnn btn-primary btn-user btn-block">
                                    Registrasi Akun
                                </button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            
                            <div class="text-centere">
                                <a class="small" href="{{ route('password.request')}}">Lupa Password?</a>
                            </div>
                            <div class="text-centere">
                                <a class="small" href="{{ route('login')}}">Sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor')}}/jquery/jquery.min.js"></script>
    <script src="{{ asset('template/vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor')}}/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js')}}/sb-admin-2.min.js"></script>

</body>

</html>
