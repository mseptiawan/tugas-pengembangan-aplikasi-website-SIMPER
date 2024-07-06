<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BorrowingSeeder extends Seeder
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
        Borrowing::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['students_id' => 10022, 'books_id' => 4829, 'borrowed_at' => Carbon::now(), 'returned_at' => Carbon::now()->addDay(3)],
            ['students_id' => 14344, 'books_id' => 1938, 'borrowed_at' => Carbon::now(), 'returned_at' => Carbon::now()->addDay(3)],
            ['students_id' => 15022, 'books_id' => 5742, 'borrowed_at' => Carbon::now(), 'returned_at' => Carbon::now()->addDay(3)],
            ['students_id' => 15032, 'books_id' => 8364, 'borrowed_at' => Carbon::now(), 'returned_at' => Carbon::now()->addDay(3)],
        ];
        foreach ($data as $value) {
            Borrowing::insert([
                'students_id' => $value['students_id'],
                'books_id' => $value['books_id'],
                'borrowed_at' => $value['borrowed_at'],
                'returned_at' => $value['returned_at'],
            ]);
        }
    }
}
