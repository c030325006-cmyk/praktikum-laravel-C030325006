<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Tambah Mata Kuliah</h1>

    <form action="{{ route('matakuliah.store') }}" method="POST">

        @csrf

        <label for="kode_mk">Kode Mata Kuliah</label>
        <input type="text" id="kode_mk" name="kode_mk" placeholder="Contoh: MK001">

        <label for="nama_mk">Nama Mata Kuliah</label>
        <input type="text" id="nama_mk" name="nama_mk" placeholder="Contoh: Pemrograman Web">

        <label for="sks">SKS</label>
        <input type="number" id="sks" name="sks" min="1" max="4">

        <label for="semester">Semester</label>
        <input type="number" id="semester" name="semester" min="1" max="8">

        <label for="dosen_id">Dosen</label>

<select id="dosen_id" name="dosen_id" required>
    <option value="">-- Pilih Dosen --</option>

   @foreach ($dosens as $dosen)
    <option value="{{ $dosen->id }}">
        {{ $dosen->name }}
    </option>
@endforeach
</select>

        <button type="submit">Simpan</button>

    </form>

    <a href="/matakuliah">← Kembali ke Data Mata Kuliah</a>

</div>

</body>
</html>