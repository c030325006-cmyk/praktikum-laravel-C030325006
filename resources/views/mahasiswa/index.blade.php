@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')

    <h1>Daftar Mahasiswa</h1>

    <p>
        <a href="{{ route('matakuliah.index') }}">
            Lihat Daftar Mata Kuliah
        </a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">

        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>

        @forelse ($mahasiswa as $mhs)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $mhs->nim }}</td>

            <td>{{ $mhs->nama }}</td>

            <td>{{ $mhs->prodi }}</td>

            <td>{{ $mhs->semester }}</td>

            <td>
                <a href="{{ route('mahasiswa.show', $mhs->id) }}">
                    Lihat Detail
                </a>
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="6">
                Belum ada data mahasiswa.
            </td>
        </tr>

        @endforelse

    </table>

@endsection