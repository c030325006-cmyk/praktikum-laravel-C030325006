<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Informasi Akademik')</title>
</head>

<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

</body>

</html>