<?php

namespace Database\Seeders;

use App\Models\Shelf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        Shelf::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['lokasi_rak' => '1'],
            ['lokasi_rak' => '2'],
            ['lokasi_rak' => '3'],
            ['lokasi_rak' => '4'],
            ['lokasi_rak' => '5'],
            
        ];
        foreach ($data as $value) {
            Shelf::insert([
                "lokasi_rak" => $value["lokasi_rak"],
            ]);
        }
    }
}
