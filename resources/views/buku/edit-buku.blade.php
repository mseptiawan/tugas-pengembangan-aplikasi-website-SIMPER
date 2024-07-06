@extends('layouts.master')

<header>
    <style>
        .container {
            margin-left: 200px !important;
            height: 600px !important;
            margin-top: 70px;


        }

        .btn {
            background-color: #03B6CE !important;
        }

        .form-container {
            width: 600px !important;
            background-color: white;
            border-radius: 15px;
            padding: 15px 25px 0 25px !important;
        }

        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>

</header>

@section('content')
    <div class="container pt-4 bg-whitebg-info-subtle d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="form-container col-md-10 col-xl-15">
                <h1>Ubah data buku</h1>
                <hr>
                <form action="/books-edit/{{ $books->id }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="id" class="form-label">Kode buku</label>
                        <input type="text" id="id" name="id" value="{{ old('id') ?? $books->id }}"
                            class="form-control">
                        @error('id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul buku</label>
                        <input type="text" id="judul_buku" name="judul_buku"
                            value="{{ old('judul_buku') ?? $books->judul_buku }}" class="form-control">
                        @error('judul_buku')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penulis">Penulis</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis') ?? $books->penulis }}"
                            class="form-control">
                        @error('penulis')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" id="penerbit" name="penerbit"
                            value="{{ old('penerbit') ?? $books->penerbit }}" class="form-control">
                        @error('penerbit')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="shelfs_id" class="form-label">Rak</label>
                        <select name="shelfs_id" id="shelfs_id" class="form-select">
                            <option value="1" {{ (old('shelfs_id') ?? $books->shelfs_id) == '1' ? 'selected' : '' }}>
                                Rak 1</option>
                            <option value="2" {{ (old('shelfs_id') ?? $books->shelfs_id) == '2' ? 'selected' : '' }}>
                                Rak 2</option>
                            <option value="3" {{ (old('shelfs_id') ?? $books->shelfs_id) == '3' ? 'selected' : '' }}>
                                Rak 3</option>
                            <option value="4" {{ (old('shelfs_id') ?? $books->shelfs_id) == '4' ? 'selected' : '' }}>
                                Rak 4</option>
                            <option value="5" {{ (old('shelfs_id') ?? $books->shelfs_id) == '5' ? 'selected' : '' }}>
                                Rak 5</option>
                        </select>
                        @error('shelfs_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary my-2 mb-4">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
