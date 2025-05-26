@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')

@auth
 <a class="btn btn-danger" href="{{ route('logoutUser') }}" role="button">Выйти</a>

<div class="overflow-hidden w-75 mx-auto justify-content-md-end">
  <div class="text-end"><a href="{{ route('newTask') }}" class="btn btn-primary text-end mb-3">Новая задача<a></div>
    <div class="card mb-3 text-center">
        <h5 class="card-header">Задачи</h5>
        <div class="card-body">
            <div class="card-text">
                <div class="row gy-4 gx-0">
    @for ($i = 0; $i < 5; $i++)
    <div class="col-6">
      <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <a href="#" class="btn-close position-absolute top-0 end-0"></a>
                <h5 class="card-title">Доделать сайт</h5>
                <p class="card-text">Надо</p>
                <a href="#" class="btn btn-primary">Завершить</a>
            </div>
       </div>
    </div>
    @endfor
</div>
</div>
    </div>
  </div>
</div>

@endauth

@guest

<form method="POST" action="{{ route('authUser') }}" class="position-absolute top-50 start-50 translate-middle w-25 mx-auto">
        @csrf
    <div class="mb-3">
        <label for="InputEmail" class="form-label">Email</label>
        <input type="email" class="shadow-sm form-control" id="InputEmail" aria-describedby="emailHelp" name="email" required>
    </div>
    <div class="mb-3">
        <label for="InputPassword" class="form-label">Пароль</label>
        <input type="password" class="shadow-sm form-control" id="InputPassword" name="password" required>
    </div>
    <button type="submit" class="w-100 shadow-sm btn btn-primary ">Войти</button>
    </form>
@endguest

@endsection