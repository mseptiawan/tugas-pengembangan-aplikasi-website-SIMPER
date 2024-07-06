@extends('layouts.master')

<header>
    <style>
        .container {
            margin-left: 200px !important;
            height: 600px !important;
            margin-top: 40px;

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
    <div class="container pt-4  bg-info-subtle d-flex justify-content-center align-items-center">
        <div class="row">
            {{-- col-md-4 col-lg-4 --}}
            <div class="form-container ">
                <h1>Tambah data</h1>
                <hr>
                <form action="/students" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">NIS</label>
                        <input type="text" id="id" name="id" value="{{ old('id') }}" class="form-control">
                        @error('id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            class="form-control">
                        @error('nama')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                            class="form-control">
                        @error('alamat')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 w-60">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="form-check me-5">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki_laki"
                                    value="L" {{ old('jenis_kelamin') }}>
                                <label for="laki_laki" class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan"
                                    value="P" {{ old('jenis_kelamin') }}>
                                <label for="perempuan" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Kelas</label>
                        <select name="class_id" id="class_id" class="form-select">
                            <option value="1" {{ old('class_id') == '1' ? 'selected' : '' }}>kelas 2A</option>
                            <option value="2" {{ old('class_id') == '2' ? 'selected' : '' }}>kelas 2B</option>
                            <option value="3"{{ old('class_id') == '3' ? 'selected' : '' }}>kelas 2C</option>
                            <option value="4" {{ old('class_id') == '4' ? 'selected' : '' }}>kelas 3A</option>
                            <option value="5" {{ old('class_id') == '5' ? 'selected' : '' }}>kelas 3B</option>
                            <option value="6" {{ old('class_id') == '6' ? 'selected' : '' }}>kelas 3C</option>
                            <option value="7"{{ old('class_id') == '7' ? 'selected' : '' }}>kelas 4A</option>
                            <option value="8"{{ old('class_id') == '8' ? 'selected' : '' }}>kelas 4B</option>
                            <option value="9"{{ old('class_id') == '9' ? 'selected' : '' }}>kelas 4C</option>
                            <option value="10"{{ old('class_id') == '10' ? 'selected' : '' }}>kelas 5A</option>
                            <option value="11"{{ old('class_id') == '11' ? 'selected' : '' }}>kelas 5B</option>
                            <option value="12"{{ old('class_id') == '12' ? 'selected' : '' }}>kelas 5C</option>
                            <option value="13"{{ old('class_id') == '13' ? 'selected' : '' }}>kelas 6A</option>
                            <option value="14"{{ old('class_id') == '14' ? 'selected' : '' }}>kelas 6B</option>
                            <option value="15"{{ old('class_id') == '15' ? 'selected' : '' }}>kelas 6C</option>
                        </select>
                        @error('class_id')
                            {{ $message }}
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
