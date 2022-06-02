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

@if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() !== 'home')
  <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME', 'Fraud Training') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.home') }}">Posts</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" class="d-inline-block" method="POST">
              @csrf
              <button class="btn btn-transparent nav-link text-white" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endif

@if (session('error'))
  <div class="container mt-5">
    <div class="alert alert-danger" role="alert">
      {{ session('error') }}
    </div>
  </div>
@endif

@if (session('success'))
  <div class="container mt-5">
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  </div>
@endif

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>