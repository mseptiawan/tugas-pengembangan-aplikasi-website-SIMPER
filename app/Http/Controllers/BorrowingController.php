<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Student;
use App\Rules\UnikBorrowing;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $borrowings = Student::with(['class', 'borrowedBooks'])->where('nama', 'LIKE', '%' . $search . '%')->get();
        return view('peminjaman.main-page-borrowings', ['borrowings' => $borrowings]);
    }
    public function create()
    {
        $students = Student::with(['class', 'borrowedBooks'])->get();
        $books = Book::all();
        return view('peminjaman.tambah-peminjaman', ['students' => $students, 'books' => $books]);
    }
    public function store(Request $request)

    {
        $validate = $request->validate([
            'books' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (Borrowing::where('books_id', $value)->exists()) {
                        $fail('buku yang anda pilih sudah dipinjam');
                    }
                },
            ],
            // 'students_id' => 'required|exists:students,id',
        ]);
        $borrowed_at = Carbon::now();
        $returned_at = Carbon::now()->addDay(3);
        $data = [
            'students_id' => $request->students,
            'books_id' => $request->books,
            'borrowed_at' => $borrowed_at,
            'returned_at' => $returned_at,
        ];

        Borrowing::create($data);
        $request->session()->flash('pesan', "data berhasil ditambahkan");
        return redirect('/borrowings');
    }
    public function destroy(Request $request, $id)
    {
        // $borrowed = Borrowing::findOrFail($students_id);
        // dd($id);
        $borrowed =  Student::findOrFail($id);
        $borrowed->borrowedBooks()->detach();
        $request->session()->flash('pesan', "tindakan berhasil");
        return redirect('/borrowings');
    }
    public function export()
    {
        $borrowings = Student::with(['class', 'borrowedBooks'])->get();
        $pdf = Pdf::loadView('pdf.export-pdf', ['borrowings' => $borrowings]);
        return $pdf->download('invoice.pdf');
    }
}
