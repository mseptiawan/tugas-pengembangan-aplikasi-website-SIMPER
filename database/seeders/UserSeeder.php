<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
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
        //
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['email' => 'aditjansa@gmail.com', 'poto' => 'bosdunia.jpg', 'nama' => 'Adit jansa', 'role' => 'Admin', 'password' =>  bcrypt("adit")],
            ['email' => 'mseptiawan@gmail.com', 'poto' => 'fotopria.png', 'nama' => 'Septiawan', 'role' => 'Admin', 'password' => bcrypt("wawan")],
            ['email' => 'rara@gmail.com', 'poto' => 'fotowanita.png', 'nama' => 'Rara Ananta', 'role' => 'Admin', 'password' => bcrypt("rara")],
            ['email' => 'sifa@gmail.com', 'poto' => 'fotowanita.png', 'nama' => 'Syiffa', 'role' => 'Admin', 'password' => bcrypt("sifa")],
            ['email' => 'userbiasa@gmail.com', 'poto' => 'userbiasa.png', 'nama' => 'siswa siswi', 'role' => 'User', 'password' =>  bcrypt("userbiasa")],
        ];
        foreach ($data as $value) {
            User::insert([
                'email' => $value['email'],
                'poto' => $value['poto'],
                'nama' => $value['nama'],
                'role' => $value['role'],
                'password' => $value['password'],

            ]);
        }
    }
}
