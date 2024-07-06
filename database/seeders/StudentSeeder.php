<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['id' => 10022, 'nama' => 'Adit jansa', 'alamat' => 'ulu', 'jenis_kelamin' => 'L', 'class_id' => 9],
            ['id' => 14344, 'nama' => 'Rara ananta bunga', 'alamat' => 'sukabangun', 'jenis_kelamin' => 'P', 'class_id' => 8],
            ['id' => 15022, 'nama' => 'Syiffa Muqaddimah', 'alamat' => 'Komp Melati', 'jenis_kelamin' => 'P', 'class_id' => 6],
            ['id' => 15032, 'nama' => 'Septiawan', 'alamat' => 'sukamaju', 'jenis_kelamin' => 'L', 'class_id' => 9],
            ['id' => 83645, 'nama' => 'Rahmat Firdaus', 'alamat' => 'Bendung', 'jenis_kelamin' => 'L', 'class_id' => 4],
            ['id' => 39210, 'nama' => 'Rizky al furqon', 'alamat' => 'Komp tempalo', 'jenis_kelamin' => 'L', 'class_id' => 3],
            ['id' => 74823, 'nama' => 'Mutia syakirah', 'alamat' => 'Jl Opi', 'jenis_kelamin' => 'P', 'class_id' => 6],
            ['id' => 48219, 'nama' => 'Cinta', 'alamat' => 'Jl Rajawali', 'jenis_kelamin' => 'P', 'class_id' => 1],
            ['id' => 38217, 'nama' => 'alya putri rizaldi', 'alamat' => 'Jl kenari', 'jenis_kelamin' => 'P', 'class_id' => 2],
            ['id' => 47293, 'nama' => 'nabil syawal', 'alamat' => 'Jl Angkatan', 'jenis_kelamin' => 'L', 'class_id' => 8],
            ['id' => 28571, 'nama' => 'Ahmad andika', 'alamat' => 'Jl keramat', 'jenis_kelamin' => 'L', 'class_id' => 6],
            ['id' => 56192, 'nama' => 'Roid tobing', 'alamat' => 'Jl Lebak murni', 'jenis_kelamin' => 'L', 'class_id' => 1],
            ['id' => 91736, 'nama' => 'Tri w', 'alamat' => 'Jl sakura', 'jenis_kelamin' => 'L', 'class_id' => 9],
            ['id' => 45123, 'nama' => 'Geri', 'alamat' => 'Jl sukabangun', 'jenis_kelamin' => 'L', 'class_id' => 9],
            ['id' => 23846, 'nama' => 'Nurdin', 'alamat' => 'Komp tempalo', 'jenis_kelamin' => 'L', 'class_id' => 3],
            ['id' => 58492, 'nama' => 'Siti halima', 'alamat' => 'Jl Opi', 'jenis_kelamin' => 'P', 'class_id' => 6],
            ['id' => 19873, 'nama' => 'Nurul fajriyah', 'alamat' => 'Jl Rajawali', 'jenis_kelamin' => 'P', 'class_id' => 1],
            ['id' => 74920, 'nama' => 'mutiara', 'alamat' => 'Jl kenari', 'jenis_kelamin' => 'P', 'class_id' => 2],
            ['id' => 57382, 'nama' => 'David saputra', 'alamat' => 'Jl Angkatan', 'jenis_kelamin' => 'L', 'class_id' => 8],
            ['id' => 28471, 'nama' => 'Acen', 'alamat' => 'Jl keramat', 'jenis_kelamin' => 'L', 'class_id' => 6],
            ['id' => 63847, 'nama' => 'Ericson', 'alamat' => 'Jl Lebak 6', 'jenis_kelamin' => 'L', 'class_id' => 10],
            ['id' => 65847, 'nama' => 'Asep', 'alamat' => 'Jl Lebak 4', 'jenis_kelamin' => 'L', 'class_id' => 11],
            ['id' => 63317, 'nama' => 'Ucup', 'alamat' => 'Jl Lebak 2', 'jenis_kelamin' => 'L', 'class_id' => 12],
            ['id' => 60317, 'nama' => 'Cecep', 'alamat' => 'Jl Lebak 100', 'jenis_kelamin' => 'L', 'class_id' => 13],
            ['id' => 62177, 'nama' => 'suma', 'alamat' => 'Jl Lebak 7', 'jenis_kelamin' => 'L', 'class_id' => 14],




        ];
        foreach ($data as $value) {
            Student::insert([
                "id" => $value['id'],
                "nama" => Str::of($value['nama'])->upper(),
                "alamat" => $value["alamat"],
                "jenis_kelamin" => $value["jenis_kelamin"],
                "class_id" => $value["class_id"],
            ]);
        }
    }
}
