<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>@yield('title', 'Default title')</title>
    @isset($description)
        <meta name="description" content="{{ $description }}">
    @endisset
</head>
<body>
  
  @section('navbar')
    <nav class="navbar navbar-expand-lg bg-dark mb-3" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('index') }}">Задачки для прокачки</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('index') }}">Главная</a>
              </li>
              @auth
              @if (auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.newStatus') }}">Пользователи</a>
                </li>
              @endif
              @endauth
            </ul>
          </div>
        </div>
      </nav>
  @show
    <div class="container md-3">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>