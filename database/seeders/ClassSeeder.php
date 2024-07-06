<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['nama' => '2A'],
            ['nama' => '2B'],
            ['nama' => '2C'],
            ['nama' => '3A'],
            ['nama' => '3B'],
            ['nama' => '3C'],
            ['nama' => '4A'],
            ['nama' => '4B'],
            ['nama' => '4C'],
            ['nama' => '5A'],
            ['nama' => '5B'],
            ['nama' => '5C'],
            ['nama' => '6A'],
            ['nama' => '6B'],
            ['nama' => '6C'],
        ];
        foreach ($data as $value) {
            ClassRoom::insert([
                "nama" => $value["nama"],
            ]);
        }
    }
}
