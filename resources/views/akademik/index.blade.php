<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Akademik</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        h2 {
            margin-top: 35px;
            color: #444;
        }

        .container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eaeaea;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Manajemen Data Akademik</h1>

    <p>
        Halaman ini menampilkan data dosen dan data mata kuliah
        beserta relasi antara keduanya menggunakan Eloquent.
    </p>

    <h2>Data Dosen</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($dosens as $dosen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dosen->name }}</td>
                    <td>{{ $dosen->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data dosen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <h2>Data Mata Kuliah</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($matakuliahs as $matakuliah)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $matakuliah->kode_mk }}</td>
                    <td>{{ $matakuliah->nama_mk }}</td>
                    <td>{{ $matakuliah->sks }}</td>
                    <td>{{ $matakuliah->semester }}</td>
                    <td>
                        {{ $matakuliah->dosen->name ?? 'Belum ada dosen' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>