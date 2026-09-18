<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matakuliah;

class AkademikController extends Controller
{
    public function index()
    {
        $dosens = User::all();
        $matakuliahs = Matakuliah::with('dosen')->get();

        return view('akademik.index', compact('dosens', 'matakuliahs'));
    }
}