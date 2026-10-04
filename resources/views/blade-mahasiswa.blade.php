<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa - Blade</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    @foreach ($mahasiswa as $mhs)
        <hr>

        <p>NIM: {{ $mhs->nim ?? 'NIM tidak tersedia' }}</p>

        <p>Nama: {{ $mhs->nama ?? 'Nama tidak tersedia' }}</p>

        <p>Program Studi: {{ $mhs->prodi ?? 'Prodi tidak tersedia' }}</p>
    @endforeach

</body>
</html>