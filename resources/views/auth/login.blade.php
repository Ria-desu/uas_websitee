<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Toko Anugrah Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css')}}/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins';
            background: rgb(215, 239, 255); /* Gradient background dari atas ke bawah */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            border: 1px solid #ddd; /* Border around the card */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(29, 89, 120, 0.1);
            width: 100%;
            min-width: 1000px;
            background-color: rgb(255, 255, 255); /* Gradient background dari atas ke bawah */
            text-align: center;
            width: 500px; /* Tentukan lebar card */
            margin: calc(50vh - 100px) auto 0; /* Vertikal tengah manual */
            margin: 130px auto 0;
            height:500px;
        }

        /* .p-5{
            justify-content: left;
            margin-left:450px;
            margin-top:50px;
            flex:1;
        } */

        .card-body {
            padding: 70px;
            display: flex;
            flex-direction: row;
            justify-content: space-between; Vertically center content
            align-items: center; /* Horizontally center content */
            
        }

        .btn-primary {
            background-color:rgb(105, 152, 184);
            transition: background-color 0.5s;
            border-radius: 50px;
            height:30px;
            width:100px;
            color:rgb(255, 255, 255);
            font-size:15px;
            margin-bottom:20px;
            border-color:transparent;
        }

        .btn-primary:hover {
            background-color:rgb(74, 131, 229);
            border-color: #2e59d9;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
            margin-bottom: 20px; /* Space between inputs */
        }

        .form-control:focus {
            border-color:rgb(255, 0, 0);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .text-center h1 {
            font-weight: 700;
            color: #4e73df; /* Text color adjusted to match the theme */
            font-size: 32px;
            margin-bottom: 20px;
            margin-top: -30px;
        }

        .text-centere .small {
            color: #4e73df; /* Warna teks default */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-size: 14px; /* Ukuran font lebih kecil */
            font-weight: 100; /* Mengatur ketebalan font */
            transition: color 0.3s, text-decoration 0.3s; /* Efek transisi saat hover */
            
        }

        .small {
            color: #4e73df;
            text-decoration: none;
        }

        .small:hover {
            color:rgb(14, 45, 138);
        }

        .text-center h1{
            margin-top: 7px;
            text-align:center;
            margin-bottom:30px;
            margin-left:0px;
            color:rgb(57, 82, 155);
        }

        .text-centere{
            margin-top: 1px;
            text-align:center;
            margin-bottom:10px;
            
        }
        
        .text-center h1{
            /* background-color:#2e59d9;
            height:90px; */
        }

        .input-group-append .fa {
            cursor: pointer;
        }

        .form-group{
            min-height:50px;

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
            font-size: 13px; /* Ukuran teks placeholder */
            border: 1px solid #ccc;
            border-radius: 20px;
        }
        .text-center h1{
            height:30px;
        }

        .input-group {
            position: relative;
        }

        .input-group-append {
            position: absolute;
            right: 10px;
            top: 35%;
            transform: translateY(-50%);
        }
        .utama{
            margin-right:200px;
            flex:1;
            text-align:center;
            margin-top:10px;
            margin-left:50px;
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

        .utama p{
            font-size: 24px;
            font-family:'Poppins';
            color:rgb(57, 82, 155);
            margin-top:10px;
            font-weight: 500 !important;

        }

        .text-centere a {
            font-weight: 400 !important;
        }

        .btnn{
            font-family:'Poppins';
        }

        


    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="apaan col-lg-12">
                        <div class="utama col-lg-12 d-flex justify-content-center align-items-center bg-light">
                            <p>Selamat Datang</p>
                            
                            <img src="{{ asset('img/logonya.png') }}" alt="logo">
                            <p>Silakan Login</p>

                        </div>
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-dark mb-4">LOGIN</h1>
                            </div>
                            <form action="{{route('login')}}" method="POST" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" placeholder="Alamat Email"

                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btnn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-centere">
                                <a class="small" href="{{ route('password.request')}}">Lupa Password?</a>
                            </div>
                            <div class="text-centere">
                                <a class="small" href="{{ route('register')}}">Buat Akun!</a>
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

    <script>
        // Script to toggle password visibility
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#exampleInputPassword");

        togglePassword.addEventListener("click", function() {
            // Toggle the password visibility
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;


            // Toggle the icon between "eye" and "eye-slash"
            this.innerHTML = type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    </script>

</body>
</html>
