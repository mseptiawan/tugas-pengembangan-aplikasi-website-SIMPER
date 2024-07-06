<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Str;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller

{

    public function index(Request $request)
    {
        if (Auth::user()->email == 'userbiasa@gmail.com') {
            return redirect('/books');
        }
        $search = $request->search;
        $students = Student::with('class')->where('nama', 'LIKE', '%' . $search . '%')->get();
        return view('siswa.home', ['students' => $students]);
    }

    public function create()
    {
        return view('siswa.tambah-siswa');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|size:5|unique:students,id',
            'nama' => 'required|',
            'alamat' => 'required|',
            'jenis_kelamin' => 'required|in:P,L',
            'class_id' => 'required|',
        ]);
        $validate['nama'] = Str::of($validate['nama'])->upper();
        Student::create($validate);
        $request->session()->flash('pesan', "data berhasil ditambahkan");
        return redirect('/students');
        // return redirect('/test');
    }

    public function edit($id)
    {

        $students = Student::findOrFail($id);
        return view('siswa.students-edit', ['students' => $students]);
    }
    public function update(Request $request, $id)
    {
        $students = Student::findOrFail($id);
        $validate = $request->validate([
            'id' => 'required|size:5|',
            'nama' => 'required|',
            'alamat' => 'required|',
            'jenis_kelamin' => 'required|in:P,L',
            'class_id' => 'required|',
        ]);
        $validate['nama'] = Str::of($validate['nama'])->upper();
        Student::where('id', $students->id)->update($validate);
        $request->session()->flash('pesan', "data berhasil diupdate");
        return redirect('/students');
    }

    public function destroy(Request $request, $id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        $request->session()->flash('pesan', "data berhasil dihapus");
        return redirect('/students');
    }
}
