<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styling untuk modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .modal.active {
            display: flex;
        }
        /* Sticky sidebar */
        aside {
            position: sticky;
            top: 0; /* Sidebar akan tetap terlihat saat di-scroll */
            height: 100vh; /* Sidebar penuh tinggi layar */
            overflow-y: auto; /* Tambahkan scroll jika menu terlalu panjang */
        }

        .w-64{
            background-color:rgb(215, 239, 255);
        }

        .block{
            font-color:rgb(33, 91, 131);
        }

        /* Warna latar belakang aside */
        aside {
            background-color: #f8f9fa; /* Warna latar belakang aside */
            color: #333; /* Warna teks default */
        }

        /* Warna garis border */
        aside .border-b {
            border-color: #3490dc; /* Ubah sesuai warna yang diinginkan */
        }

        /* Warna teks header */
        aside h1 {
            color: rgb(33, 91, 131); /* Warna teks judul */
        }

        /* Warna tautan dan efek hover */
        aside a {
            color:rgb(33, 92, 131); /* Warna teks tautan */
            text-decoration: none;
        }

        aside a:hover {
            background-color: #93c5fd; /* Warna latar belakang saat hover */
            color: #ffffff; /* Warna teks saat hover */
        }

        .text-xl{

        }

        .logo{
            height:50px;
            align-items:center;
        }

        .active > a {
            background-color:rgb(79, 96, 145); /* Warna biru */
            color: white; /* Teks putih */
            font-weight: bold; /* Teks tebal */
        }

    </style>
    <script>
        // Fungsi untuk menampilkan modal logout
        function showLogoutModal(event) {
            event.preventDefault(); // Mencegah form logout langsung dikirim
            const modal = document.getElementById('logout-modal');
            modal.classList.add('active');
            const form = event.target.closest('form');

            // Tombol "Ya" untuk logout
            document.getElementById('confirm-logout').onclick = function() {
                form.submit();
            };

            // Tombol "Tidak" untuk membatalkan logout
            document.getElementById('cancel-logout').onclick = function() {
                modal.classList.remove('active');
            };
        }
    </script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 h-screen">
            <div class="p-4 text-center border-b border-blue-400 flex items-center justify-center space-x-4">
                <img src="{{ asset('img/logonya.png') }}" alt="logo" class="logo w-10 h-10">
                <h1 class="text-xl font-bold">Anugrah</h1>
            </div>

            <div class="menubar">
            <nav class="mt-4">
                <ul>
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
                        <a href="{{ url('home') }}" class="block py-2 px-4 hover:bg-blue-400">Dashboard</a>
                    </li>
                    <li class="{{ request()->is('tampil-barang') ? 'active' : '' }}">
                        <a href="{{ url('tampil-barang') }}" class="block py-2 px-4 hover:bg-blue-400">Barang</a>
                    </li>
                    <li class="{{ request()->is('tampil-kategori') ? 'active' : '' }}">
                        <a href="{{ url('tampil-kategori') }}" class="block py-2 px-4 hover:bg-blue-400">Kategori</a>
                    </li>
                    <li class="{{ request()->is('pesanan') ? 'active' : '' }}">
                        <a href="{{ url('pesanan') }}" class="block py-2 px-4 hover:bg-blue-400">Pesanan</a>
                    </li>
                    <li class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                        <a href="{{ route('laporan.index') }}" class="block py-2 px-4 hover:bg-blue-400">Laporan</a>
                    </li>

                    @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="w-full text-left" onsubmit="showLogoutModal(event)">
                            @csrf
                            <button type="submit" class="block py-2 px-4 hover:bg-blue-400 w-full text-left">
                                Logout ({{ Auth::user()->name }})
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </nav>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <header class="bg-white shadow-md rounded-lg p-4 mb-6">
                <h4><span style="font-size: 24px;">Halo, {{ Auth::user()->name }}</span></h4>
                <!-- <h1 class="text-2xl font-bold">@yield('header', 'Dashboard')</h1> -->
            </header>

            <!-- Content -->
            <div>
                 
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Modal Logout -->
    <div id="logout-modal" class="modal">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
            <h2 class="text-lg font-bold mb-4">Peringatan Logout</h2>
            <p class="mb-6">Apakah Anda yakin ingin keluar?</p>
            <div class="flex justify-center space-x-4">
                <button id="confirm-logout" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                    Ya
                </button>
                <button id="cancel-logout" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Tidak
                </button>
            </div>
        </div>
    </div>
</body>
</html>
