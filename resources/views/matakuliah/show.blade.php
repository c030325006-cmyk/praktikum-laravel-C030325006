@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')

    <h1>Detail Mata Kuliah</h1>

    <p>
        <strong>Kode Mata Kuliah:</strong>
        {{ $matakuliah->kode_mk }}
    </p>

    <p>
        <strong>Nama Mata Kuliah:</strong>
        {{ $matakuliah->nama_mk }}
    </p>

    <p>
        <strong>SKS:</strong>
        {{ $matakuliah->sks }}
    </p>

    <p>
        <strong>Semester:</strong>
        {{ $matakuliah->semester }}
    </p>

    <br>

    <a href="{{ route('matakuliah.index') }}">
        Kembali ke Daftar Mata Kuliah
    </a>

@endsection