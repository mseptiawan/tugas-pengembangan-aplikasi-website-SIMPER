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
    <div class="container pt-4 bg-whitebg-info-subtle d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="form-container col-md-10 col-xl-15">
                <h1>Ubah data siswa</h1>
                <hr>
                <form action="/students-edit/{{ $students->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" id="id" name="id" value="{{ old('id') ?? $students->id }}"
                            class="form-control">
                        @error('id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nim') ?? $students->nama }}"
                            class="form-control">
                        @error('nama')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('nim') ?? $students->alamat }}"
                            class="form-control">
                        @error('alamat')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 w-60">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki_laki"
                                    value="L"
                                    {{ (old('jenis_kelamin') ?? $students->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                                <label for="laki_laki" class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan"
                                    value="P"
                                    {{ (old('jenis_kelamin') ?? $students->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                                <label for="perempuan" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 w-60">
                        <label for="class_id" class="form-label">Kelas</label>
                        <select name="class_id" id="class_id" class="form-select">
                            <option value="1"
                                {{ (old('class_id') ?? $students->class->id) == '1' ? 'selected' : '' }}>
                                kelas 2A
                            </option>
                            <option value="2"
                                {{ (old('class_id') ?? $students->class->id) == '2' ? 'selected' : '' }}>
                                kelas 2B</option>
                            <option value="3"
                                {{ (old('class_id') ?? $students->class->id) == '3' ? 'selected' : '' }}>
                                kelas 2C</option>
                            <option value="4"
                                {{ (old('class_id') ?? $students->class->id) == '4' ? 'selected' : '' }}>
                                kelas 3A</option>
                            <option value="5"
                                {{ (old('class_id') ?? $students->class->id) == '5' ? 'selected' : '' }}>kelas 3B</option>
                            <option value="6"
                                {{ (old('class_id') ?? $students->class->id) == '6' ? 'selected' : '' }}>kelas 3C</option>
                            <option value="7"
                                {{ (old('class_id') ?? $students->class->id) == '7' ? 'selected' : '' }}>kelas 4A</option>
                            <option value="8"
                                {{ (old('class_id') ?? $students->class->id) == '8' ? 'selected' : '' }}>kelas 4B</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '9' ? 'selected' : '' }}>
                                kelas 4C</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '10' ? 'selected' : '' }}>
                                kelas 5A</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '11' ? 'selected' : '' }}>
                                kelas 5B</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '12' ? 'selected' : '' }}>
                                kelas 5C</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '13' ? 'selected' : '' }}>
                                kelas 6A</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '14' ? 'selected' : '' }}>
                                kelas 6B</option>
                            <option value="9"
                                {{ (old('class_id') ?? $students->class->id) == '15' ? 'selected' : '' }}>
                                kelas 6C</option>
                        </select>
                        @error('class_id')
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
