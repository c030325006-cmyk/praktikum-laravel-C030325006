@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')

    <h1>Daftar Mata Kuliah</h1>

    <p>
        <a href="{{ route('mahasiswa.index') }}">
            Lihat Daftar Mahasiswa
        </a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Keterangan</th>
            <th>Posisi</th>
            <th>Aksi</th>
        </tr>

        @forelse ($matakuliahs as $mk)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $mk->kode_mk }}</td>

            <td>{{ $mk->nama_mk }}</td>

            <td>{{ $mk->sks }}</td>

            <td>{{ $mk->semester }}</td>

            <td>
                @if ($mk->sks > 3)
                    <strong>SKS Besar</strong>
                @else
                    Normal
                @endif
            </td>

            <td>
                @if ($loop->first)
                    Data Pertama
                @elseif ($loop->last)
                    Data Terakhir
                @else
                    Data Tengah
                @endif
            </td>

            <td>
                <a href="{{ route('matakuliah.show', $mk->id) }}">
                    Lihat Detail
                </a>
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="8">
                Belum ada data mata kuliah.
            </td>
        </tr>

        @endforelse

    </table>

@endsection