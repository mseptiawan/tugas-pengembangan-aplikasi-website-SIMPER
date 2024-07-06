@extends('layouts.master')

<header>
    <style>
        .container {
            margin-left: 200px !important;
            height: 600px !important;
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
    <div class="container pt-4 bg-info-subtle d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="form-container col-md-10 col-xl-15">
                <h1>Tambah data pinjam</h1>
                <hr>
                <form action="/borrowings" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="students" class="form-label">Pilih siswa : </label>
                        <select name="students" id="students" class="form-select">
                            @foreach ($students as $data)
                                <option value="{{ $data->id }}" {{ old('students') == $data->id ? 'selected' : '' }}>
                                    {{ 'id: ' . $data->id . '  | nama: ' . $data->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('students')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="books" class="form-label">Pilih Buku : </label>
                        <select name="books" id="books" class="form-select">
                            @foreach ($books as $data)
                                <option value="{{ $data->id }}" {{ old('students') == $data->id ? 'selected' : '' }}>
                                    {{ 'id: ' . $data->id . '  | judul buku: ' . $data->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                        @error('books')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary my-2 mb-4">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
