<!DOCTYPE html>
<html lang="id">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepatu Anugrah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(223, 240, 255); /* Pastel Green Background */
            color:rgb(21, 54, 86); /* Dark Gray */
        }
        header {
            background-image:url('https://img.freepik.com/free-photo/high-rise-buildings-blue-sky-shinjuku-tokyo_1339-7000.jpg?t=st=1734732480~exp=1734736080~hmac=28b55c4c02132971721cd5ecff8d18fc0cfd26fa5f0b7251e1b6f0662ca24056&w=1060');
            background-size:cover;
            background-position:center; 
            color:white;
            padding: 5rem 0;
        }
        .navbar {
            background-color:rgb(223, 240, 255); /* Pastel Green Navbar */
        }
        .navbar-dark .navbar-brand, .navbar-dark .nav-link {
            margin-top:13px;
            padding-bottom:15px;
            color:rgb(21, 54, 86);
        }
        footer {
            background-color: rgb(138, 180, 221); /* Darker Pastel Green Footer */
        }
        .card-img-top {
            width: 100%; /* Atur lebar sesuai kebutuhan */
            height: 400px; /* Atur tinggi sesuai kebutuhan */
            object-fit: cover; /* Crop gambar sesuai ukuran kontainer */
        }
        .card-body{
            min-height: 150px; /* Sesuaikan dengan ukuran konten maksimum */
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .logonya{
            height:50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <img src="{{ asset('img/logonya.png') }}" alt="logo" class="logonya">
            <a class="navbar-brand" href="#">Toko Anugrah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Selamat Datang di Toko Anugrah!</h1>
            <p class="lead">Temukan sepatu favoritmu dengan kualitas terbaik.</p>
        </div>
    </header>

    <main class="container my-5">
        <h2 class="text-center mb-4">Produk Terbaru</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/43/b6/85/43b685a7ce03428180f0a41e82dc7d26.jpg" class="card-img-top" alt="Sepatu 1">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Fashion</h5>
                        <p class="card-text">Pilihan tepat untuk kamu yang stylish .</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/474x/41/13/a3/4113a3ba05a158041a5836b088271e01.jpg" class="card-img-top" alt="Sepatu 2">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Formal</h5>
                        <p class="card-text">Pilihan tepat untuk acara resmi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/a6/7e/ca/a67ecae790945251643e26b8f107960d.jpg" class="card-img-top" alt="Sepatu 3">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Casual</h5>
                        <p class="card-text">Cocok untuk kegiatan sehari-hari.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/fc/ca/89/fcca892e407a95e2299466361be8a8ed.jpg" class="card-img-top" alt="Sepatu 4">
                    <div class="card-body">
                        <h5 class="card-title">Sandal Casual</h5>
                        <p class="card-text">pilihan sempurna untuk gaya santai.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/ed/53/7d/ed537d0a9dcb87d7124908993625ab55.jpg" class="card-img-top" alt="Sepatu 5">
                    <div class="card-body">
                        <h5 class="card-title">Flat Shoes</h5>
                        <p class="card-text">Tampil anggun di setiap langkah .</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img src="https://i.pinimg.com/736x/b4/d0/2f/b4d02f4a53e58b184f95c5bda5ec4b42.jpg" class="card-img-top" alt="Sepatu 6">
                    <div class="card-body">
                        <h5 class="card-title">Sepatu Sport</h5>
                        <p class="card-text">Mendukung setiap langkah olahraga dengan bahan yang ringan, sol empuk, dan daya tahan maksimal untuk aktivitas sehari-hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-white text-center py-3">
        <p>&copy; 2024 Toko Anugrah. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>

</style>