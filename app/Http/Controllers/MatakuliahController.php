<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::with('dosen')->get();

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        $dosens = \App\Models\User::all();

        return view('matakuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:4',
            'semester' => 'required|integer|min:1|max:8',
            'dosen_id' => 'required|exists:users,id',
        ]);

        Matakuliah::create($request->all());

        return redirect('/matakuliah');
    }
}