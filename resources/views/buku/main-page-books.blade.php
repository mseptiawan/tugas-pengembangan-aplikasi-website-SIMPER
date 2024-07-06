@extends('layouts.master')

<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .search-input {
            border-radius: 8px;
            border: none;
            height: 35px;
            padding: 10px;
        }

        .btn-submit {
            justify-content: center;
            align-items: center;
            border: none;
            border-radius: 8px;
            height: 35px;
            width: 70px;
            background-color: #03B6CE;
            color: white;
            margin-left: 10px;
        }

        .create-students-container button {
            height: 35px;
            border: none;
            border-radius: 8px;
            background-color: #03B6CE;
        }

        .create-students-container button a {
            padding: 10px;
            text-decoration: none;
            list-style: none;
            color: white;
        }

        .create-students-container button i {
            padding-left: 5px;
        }

        .icon {
            color: white;
        }

        .create-std {
            display: flex;
        }

        .search.create-std {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }

        .search-btn-inp {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .has-search .form-control {
            padding-left: 2.375rem;
            width: 500px;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        .btn-delete {
            margin-top: 16px !important;
            border: none;
            background-color: #f44336;
            color: black;
            width: 90px;
            height: 30px;
            border-radius: 8px;
        }

        .btn-delete i {
            padding-right: 8px;
        }


        .btn-update {
            height: 30px;
            border: none;
            border-radius: 8px;
            background-color: #ffeb3b;
        }

        .btn-update a {
            padding: 3px;
            text-decoration: none;
            list-style: none;
            color: black;
        }

        .btn-update i {
            padding: 0 3px 0 5px;
        }

        .action-container {
            justify-content: center;
            align-items: center;
        }

        .action-container button {
            display: flex;
            margin: 3px;
            justify-content: center !important;
            align-items: center !important;
        }

        .fa-trash {
            color: black;
        }

        thead {
            background-color: #03B6CE;

        }

        thead td {
            vertical-align: middle !important;
        }

        thead tr th {
            border-right: 1.5px solid #ddd;
            align-items: center !important;

        }

        .table td {
            border-right: 1.5px solid #ddd;

        }

        .table td:last-child {
            border-right: none;
        }



        .container {
            margin-left: 200px !important;
        }
    </style>
</header>

@section('content')
    <div class="container mt-0">
        <div class="row">
            <div class="col-12 content-library">
                <div class="py-4 fixed-element">
                    <h2>Informasi Buku</h2>
                </div>
                <div>
                    <form action="" method="get">
                        <div class="search create-std">
                            <div class="search-btn-inp">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" name="search" class="form-control" placeholder="Cari Data..">
                                </div>
                                <button class="btn-submit">Cari</button>
                            </div>
                            @if (Auth::user()->role === 'Admin')
                                <div class="create-students-container">
                                    <button><i class="fa-solid fa-plus icon"></i><a href="/books/create">Tambah data
                                            buku</a></button>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>judul buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Lokasi rak</th>
                            @if (Auth::user()->role === 'Admin')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->judul_buku }}</td>
                                <td>{{ $data->penulis }}</td>
                                <td>{{ $data->penerbit }}</td>
                                <td>{{ 'Rak ' . $data->shelfs->lokasi_rak }}</td>
                                @if (Auth::user()->role === 'Admin')
                                    <td class="action-container d-flex align-middle">
                                        <button class="btn-update">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <a href="/books-edit/{{ $data->id }}">Update</a>
                                        </button>

                                        <form action="/books/{{ $data->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-delete" type="submit">
                                                <i class="fa-solid fa-trash"></i>Hapus</button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @empty
                            <td colspan="7" class="text-center"><i class="fa-solid fa-ban"></i>Opss.. Tidak ada data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (session()->has('pesan'))
            toastr.success('{{ session('pesan') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'GAGAL!');
            @endforeach
        @endif
    </script>

@stop
