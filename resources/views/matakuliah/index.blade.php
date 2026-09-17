<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 20px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

    <h1>Data Mata Kuliah</h1>

    <a href="/matakuliah/create">+ Tambah Mata Kuliah</a>

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

</body>
</html>