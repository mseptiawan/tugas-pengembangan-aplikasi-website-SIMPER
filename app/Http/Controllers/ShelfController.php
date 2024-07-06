<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    //
    public function tampil3()
    {
        // $studentlist = Shelf::with('buku')->get();
        $studentlist = Shelf::with('buku')->get();
        return view('rak', ['studentlist' => $studentlist]);
    }
}
