<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed&family=Teko:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success my-0 w-100" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger my-0 w-100" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>
@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>