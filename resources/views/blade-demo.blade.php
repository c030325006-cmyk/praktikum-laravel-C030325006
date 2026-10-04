<!DOCTYPE html>
<html>
<head>
    <title>Blade Demo</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    <p>Nama: {{ $nama }}</p>
    <p>NIM: {{ $nim }}</p>
    <p>Program Studi: {{ $prodi }}</p>

    <hr>

    <h2>Output dengan Blade</h2>

    <p>Output pertama menggunakan Blade escaped:</p>
    <p>{{ $html }}</p>

    <p>Output kedua menggunakan Blade unescaped:</p>
    <p>{!! $html !!}</p>

    <hr>

    <h2>Pengujian XSS</h2>

    <p>Output menggunakan Blade escaped:</p>
    <p>{{ $xss }}</p>

    <p>Output menggunakan Blade unescaped:</p>
    <p>{!! $xss !!}</p>

</body>
</html>