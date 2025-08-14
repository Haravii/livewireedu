<!DOCTYPE html>
<html>
<head>
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <meta charset="UTF-8" />
    <title>title</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route("welcome") }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route("welcome") }}">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="row">
    @livewire("user.user-create")
    @livewire("user.user-list")
  </div>
</div>
@for ($i = 0; $i < 30; $i++)
   <br>
@endfor

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>