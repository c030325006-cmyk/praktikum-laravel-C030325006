@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')

    <h1>Detail Mahasiswa</h1>

    <p>
        <strong>NIM:</strong>
        {{ $mahasiswa->nim }}
    </p>

    <p>
        <strong>Nama:</strong>
        {{ $mahasiswa->nama }}
    </p>

    <p>
        <strong>Program Studi:</strong>
        {{ $mahasiswa->prodi }}
    </p>

    <p>
        <strong>Semester:</strong>
        {{ $mahasiswa->semester }}
    </p>

    <br>

    <a href="{{ route('mahasiswa.index') }}">
        Kembali ke Daftar Mahasiswa
    </a>

@endsection