<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;
        $books = Book::with('shelfs')->where('judul_buku', 'LIKE', '%' . $search . '%')->get();
        return view('buku.main-page-books', ['books' => $books]);
    }
    public function create()
    {
        return view('buku.tambah-buku');
    }
    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $validate = $request->validate([
            'id' => 'required|size:4|unique:books,id',
            'judul_buku' => 'required',
            'penulis' => 'required|',
            'penerbit' => 'required|',
            'shelfs_id' => 'required|',
        ]);

        $validate['judul_buku'] = Str::of($validate['judul_buku'])->upper();
        Book::create($validate);
        $request->session()->flash('pesan', "data berhasil ditambahkan");
        return redirect('/books');
    }

    public function edit($id)
    {
        $books = Book::findOrFail($id);
        return view('buku.edit-buku', ['books' => $books]);
    }
    public function update(Request $request, $id, Book $book)
    {

        $this->authorize('update', $book);

        $books = Book::findOrFail($id);
        $validate = $request->validate([
            'id' => 'required|size:4|',
            'judul_buku' => 'required|',
            'penulis' => 'required|',
            'penerbit' => 'required|',
            'shelfs_id' => 'required|',
        ]);

        $validate['judul_buku'] = Str::of($validate['judul_buku'])->upper();

        Book::where('id', $books->id)->update($validate);
        $request->session()->flash('pesan', "data berhasil diupdate");
        return redirect('/books');
    }

    public function destroy(Request $request, $id, Book $book)
    {
        $this->authorize('delete', $book);

        $students = Book::findOrFail($id);
        $students->delete();
        $request->session()->flash('pesan', "data berhasil dihapus");
        return redirect('/books');
    }
}
