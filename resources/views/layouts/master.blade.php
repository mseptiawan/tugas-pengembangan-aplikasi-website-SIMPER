<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Pepustakaan K3</title>
    <link rel="shortcut icon" href="/img/logo-sekolah-indriasana.png" type="image/x-icon">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        body {
            font-family: 'nunito', Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            background-color: #f0f0f0;
        }

        .sidebar {
            position: fixed;
            width: 200px;
            background-color: #0392A5;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            color: white;
            height: 100vh;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 50px 0 0 0;
        }

        .sidebar ul li {
            position: relative;
            padding: 15px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
        }

        .sidebar ul li::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: transparent;
            transition: background-color 0.3s;
        }

        .sidebar ul li.active::before {
            background-color: #DFBC07;
            top: -5px;
            height: 60px;
            border-radius: 8px;
        }

        .sidebar ul li.active,
        .sidebar ul li:hover {
            background-color: #06A0B5;
            border-radius: 10px;
            margin-left: 5px;
        }

        .sidebar ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .profile-container img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .profil-info {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .name-profile {
            padding-left: 10px;
            text-align: left;
        }

        .name-profile label {
            margin: 0;
            font-weight: bold;
        }

        .name-profile span {
            display: block;
            font-size: 0.9em;
        }

        nav {
            position: fixed;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #0392A5, #0F707C);
            padding: 0.5rem 1rem;
            color: white;
            z-index: 100;
            margin-left: 200px !important;
        }

        .btn-logout {
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            padding: 5px;
            margin-right: 200px;
        }

        .btn-logout a {
            text-decoration: none;
            color: white;
        }

        .btn-logout a:hover {
            text-decoration: none;
            color: black;
        }

        .btn-logout i {
            cursor: pointer;
            padding-right: 5px;
        }

        .content-library {
            margin-top: 50px;
        }

        .toast-success {
            background-color: #15c415e5 !important;
        }

        .toast-top-right {
            top: 4em;
            right: 1em;
        }

        .btn-logout:hover {
            background-color: #d32f2f;
        }

        button:hover {
            background-color: #26CAE0;
        }

        .btn-update:hover {
            background-color: #FFF177;
        }

        /* .btn-delete:hover { */
            /* background-color: #cecece; */
        /* } */

        .navbar-brand a {
            text-decoration: none;
            color: white;
        }

        .navbar-brand a img {
            width: 50px;
            padding-right: 10px;
        }

        .dropdown-container {
            display: none;
            padding-left: 20px;
        }


        .dropdown-container a {
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            color: white;
            font-size: 0.9em;
        }

        .dropdown-container a {
            color: #00E0FF;
            border-radius: 8px 8px 8px 8px;
            margin-bottom: 10px;
        }

        .dropdown-container a:hover {
            color: #f0f0f0;
            margin-left: 8px;
        }

        li .fa-caret-down {
            padding-left: 2px;
        }

        body.dark-mode {
            background-color: #121212;
            color: white;
        }

        .container td .dark-mode {
            color: white;
        }

        body .dark-mode .sidebar {
            background-color: #121212;
            color: white;
        }

        nav .dark-mode {
            background-color: #121212;
            color: white;
        }

        .dark-mode-toggle {
            margin-top: auto;
            padding: 20px;
            text-align: center;
        }

        .dark-mode-toggle button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #ccc;
            color: #000000;
        }

        body.dark-mode .dark-mode-toggle button {
            background-color: #333333;
            color: #ffffff;
        }

        /* table */

        body.dark-mode th,
        body.dark-mode td {
            color: white !important;
            border-color: #444;
        }

        body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: #333;
        }

        /* body */
        body.dark-mode .form-container {
            background-color: #222;
            border: 1px solid #444;
            padding: 20px;
            border-radius: 10px;
        }

        body.dark-mode .form-label {
            color: white;
        }

        body.dark-mode .form-select,
        body.dark-mode .form-control {
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }

        body.dark-mode .form-select:focus,
        body.dark-mode .form-control:focus {
            border-color: #777;
        }

        body.dark-mode .btn-primary {
            background-color: #555;
            border-color: #555;
        }

        body.dark-mode .btn-primary:hover {
            background-color: #666;
            border-color: #666;
        }

        body.dark-mode .error-message {
            color: red;
        }

        /* sidebar */

        body.dark-mode {
            background-color: black;
            color: white;
        }

        body.dark-mode .sidebar {
            background-color: #333;
        }

        body.dark-mode .sidebar .profil-info img {
            border: 1px solid white;
        }

        body.dark-mode .sidebar .name-profile div {
            color: white;
        }

        body.dark-mode .sidebar ul li a {
            color: white;
        }

        body.dark-mode .sidebar ul li a:hover {
            color: #ccc;
        }

        body.dark-mode .sidebar .dropdown-container a {
            color: white;
        }

        body.dark-mode .sidebar .dropdown-container a:hover {
            color: #ccc;
        }

        body.dark-mode .toggle-button {
            background-color: black;
            color: white;
        }

        body.dark-mode .toggle-button:hover {
            background-color: #666;

        }

        body.dark-mode .create-std {
            background-color: #666;

        }

        /* nav */

        body.dark-mode nav {
            background: linear-gradient(to right, #333333, #555555);

        }

        /* modal */

        body.dark-mode .modal {
            color: #000000;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="profile-container">
            <div class="profil-info">
                <div>
                    <img src="{{ asset('img/' . Auth::user()->poto) }}" width="100px" alt="Foto Profil">
                </div>
                <div class="name-profile">
                    <div>{{ Auth::user()->nama }}</div>
                    <div>{{ Auth::user()->role }}</div>
                </div>
            </div>
        </div>
        <ul>
            @if (Auth::user()->email == 'userbiasa@gmail.com')
            <li class="menu-item">
                <i class="fa-solid fa-book"></i>
                <a href="/books">Informasi Buku</a>
            </li>
            @else
            <li class="menu-item dropdown-btn">
                <i class="fa-solid fa-graduation-cap"></i>
                <a href="/students">Informasi Siswa</a>
                <i class="fa-solid fa-caret-down"></i>
            </li>
            <div class="dropdown-container">

                <a href="/students/create"><i class="fa-solid fa-user-plus"></i> Add data siswa</a>
            </div>
            <li class="menu-item dropdown-btn">
                <i class="fa-solid fa-book"></i>
                <a href="/books">Informasi Buku</a>
                <i class="fa-solid fa-caret-down"></i>
            </li>
            <div class="dropdown-container">
                <a href="/books/create"><i class="fa-solid fa-folder-plus"></i> Add data buku</a>
            </div>
            <li class="menu-item dropdown-btn">
                <i class="fa-solid fa-file"></i>
                <a href="/borrowings">Peminjaman</a>
                <i class="fa-solid fa-caret-down"></i>
            </li>
            <div class="dropdown-container">
                <a href="/borrowings/create"><i class="fa-regular fa-calendar-plus"></i> Add data pinjam</a>
                <a href="/export-pdf"><i class="fa-regular fa-file-pdf"></i> Export PDF</a>
            </div>
            @endif
        </ul>
        <div class="dark-mode-toggle">
            <button class="toggle-button" onclick="toggleDarkMode()"><i class="fa-regular fa-moon"></i> Dark Mode</button>
        </div>
    </div>
    <nav>
        <div class="navbar-brand">
            <a href="/students"><img src="/img/logo-sekolah-indriasana.png" alt="">Perpustakaan K3</a>

        </div>
        <div class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
        </div>
    </nav>



    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Kamu Ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmLogout">Ya</button>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const confirmLogout = document.getElementById('confirmLogout');
            confirmLogout.addEventListener('click', function() {
                window.location.href = '/logout';
            });
        });

        const dropdownBtns = document.querySelectorAll('.dropdown-btn');
        dropdownBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('active');
                const dropdownContainer = this.nextElementSibling;
                if (dropdownContainer.style.display === 'block') {
                    dropdownContainer.style.display = 'none';
                } else {
                    dropdownContainer.style.display = 'block';
                }
            });
        });
    </script>
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.removeItem('darkMode');
            }
        }

        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
        }
    </script>
</body>

</html>