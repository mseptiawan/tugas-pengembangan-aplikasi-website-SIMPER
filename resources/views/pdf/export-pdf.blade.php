</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="title">Daftar Peminjaman</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Buku yang Dipinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
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
                            <td>{{ $data->borrowedBooks->first()->pivot->returned_at }}</td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Oopss..Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
