@extends('layouts.master')
<style>
    .container {
        margin-left: 200px !important;
    }

    .icon {
        color: white;
    }

    .create-std {
        display: flex;
        justify-content: space-around;
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

    .create-students-container {
        display: flex;
    }

    .create-students-container button {
        height: 35px;
        border: none;
        border-radius: 8px;
        background-color: #03B6CE;
        margin-left: 15px;
    }

    .create-students-container button a {
        list-style: none;
        text-decoration: none;
        color: white;
    }

    .create-students-container button {
        height: 35px;
        border: none;
        border-radius: 8px;
        background-color: #03B6CE;
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

    .btn-export {
        border: none;
        background-color: #03B6CE;
        border-radius: 8px;
        padding: 5px;
    }

    .btn-export a {
        text-decoration: none;
        color: white;
    }

    .btn-delete {
        margin-top: 16px !important;
        border: none;
        background-color: #106d10;
        width: 120px;
        height: 40px;
        color: white;
        border-radius: 8px;
        font-weight: bold;
    }
    .btn-delete:hover{
        color: white;
        font-weight: bold;
        background-color: #239123;
    }
</style>

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 content-library">
                <div class="py-4">
                    <h2>Peminjaman</h2>
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
                            <div class="create-students-container">
                                <button><i class="fa-solid fa-plus icon"></i><a href="/borrowings/create">Tambah data
                                        pinjam</a></button>
                                <div>
                                    <button class="btn-export">
                                        <i class="fa-solid fa-file-export icon"></i>
                                        <a href="/export-pdf">export pdf</a>
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>

                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>kelas</th>
                            <th>Buku yang dipinjam</th>
                            <th>tanggal pinjam</th>
                            {{-- <th>tanggal kembali</th> --}}
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($borrowings as $data)
                            @if ($data->borrowedBooks->pluck('judul_buku')->isNotEmpty())
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->class->nama }}</td>
                                    <td>{{ $data->borrowedBooks->pluck('judul_buku')->implode(', ') }}</td>
                                    <td>{{ $data->borrowedBooks->first()->pivot->borrowed_at }}</td>
                                    {{-- <td>{{ $data->borrowedBooks->first()->pivot->returned_at }}</td> --}}
                                    <td>dipinjam</td>
                                    <td>
                                        <form action="/borrowings/{{ $data->borrowedBooks->first()->pivot->students_id }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-delete" type="submit"><i
                                                    ></i>kembalikan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif

                        @empty
                            <td colspan="7" class="text-center">Oopss..Tidak ada data</td>
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
