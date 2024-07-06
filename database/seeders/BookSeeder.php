<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BookSeeder extends Seeder
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
        Book::truncate();
        Schema::enableForeignKeyConstraints();
        $data = [
            ['id' => 4829, 'judul_buku' => 'Laskar pelangi', 'penulis' => 'Andre Hirata', 'penerbit' => 'Gramedia', 'shelfs_id' => 1],
            ['id' => 1938, 'judul_buku' => 'The alchemist', 'penulis' => 'Paul coelho', 'penerbit' => 'Erlangga', 'shelfs_id' => 2],
            ['id' => 5742, 'judul_buku' => 'Rahasia Anak sukses', 'penulis' => 'Munif Chatib', 'penerbit' => 'Gramedia', 'shelfs_id' => 3],
            ['id' => 8364, 'judul_buku' => 'Teknik belajar cepat', 'penulis' => 'Brian tracy', 'penerbit' => 'Buku Kompas', 'shelfs_id' => 4],
            ['id' => 3921, 'judul_buku' => 'Belajar Gaya Belajar', 'penulis' => 'Christine', 'penerbit' => 'Balai pustaka', 'shelfs_id' => 5],
                ['id' => 2345, 'judul_buku' => 'Harry Potter and the Philosopher\'s Stone', 'penulis' => 'J.K. Rowling', 'penerbit' => 'Bloomsbury', 'shelfs_id' => 1],
                ['id' => 3456, 'judul_buku' => 'To Kill a Mockingbird', 'penulis' => 'Harper Lee', 'penerbit' => 'J.B. Lippincott & Co.', 'shelfs_id' => 3],
                ['id' => 4567, 'judul_buku' => '1984', 'penulis' => 'George Orwell', 'penerbit' => 'Secker & Warburg', 'shelfs_id' => 2],
                ['id' => 5678, 'judul_buku' => 'Pride and Prejudice', 'penulis' => 'Jane Austen', 'penerbit' => 'T. Egerton, Whitehall', 'shelfs_id' => 1],
                ['id' => 6789, 'judul_buku' => 'The Catcher in the Rye', 'penulis' => 'J.D. Salinger', 'penerbit' => 'Little, Brown and Company', 'shelfs_id' => 3],
                ['id' => 7890, 'judul_buku' => 'The Great Gatsby', 'penulis' => 'F. Scott Fitzgerald', 'penerbit' => 'Charles Scribner\'s Sons', 'shelfs_id' => 2],
                ['id' => 8901, 'judul_buku' => 'The Hobbit', 'penulis' => 'J.R.R. Tolkien', 'penerbit' => 'George Allen & Unwin', 'shelfs_id' => 1],
                ['id' => 9012, 'judul_buku' => 'The Lord of the Rings', 'penulis' => 'J.R.R. Tolkien', 'penerbit' => 'George Allen & Unwin', 'shelfs_id' => 3],
                ['id' => 1011, 'judul_buku' => 'The Da Vinci Code', 'penulis' => 'Dan Brown', 'penerbit' => 'Doubleday', 'shelfs_id' => 2],
                ['id' => 1112, 'judul_buku' => 'The Hunger Games', 'penulis' => 'Suzanne Collins', 'penerbit' => 'Scholastic Corporation', 'shelfs_id' => 1],
                ['id' => 1213, 'judul_buku' => 'The Road', 'penulis' => 'Cormac McCarthy', 'penerbit' => 'Alfred A. Knopf', 'shelfs_id' => 3],
                ['id' => 1314, 'judul_buku' => 'Brave New World', 'penulis' => 'Aldous Huxley', 'penerbit' => 'Chatto & Windus', 'shelfs_id' => 2],
                ['id' => 1415, 'judul_buku' => 'The Girl with the Dragon Tattoo', 'penulis' => 'Stieg Larsson', 'penerbit' => 'Norstedts Förlag', 'shelfs_id' => 1],
                ['id' => 1516, 'judul_buku' => 'The Chronicles of Narnia', 'penulis' => 'C.S. Lewis', 'penerbit' => 'Geoffrey Bles', 'shelfs_id' => 3],
            

        ];
        foreach ($data as $value) {
            Book::insert([
                'id' => $value['id'],
                'judul_buku' => Str::of($value['judul_buku'])->upper(),
                'penulis' => $value['penulis'],
                'penerbit' => $value['penerbit'],
                'shelfs_id' => $value['shelfs_id'],
            ]);
        }
    }
}
