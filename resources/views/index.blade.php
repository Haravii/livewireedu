@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')

{{-- список задач --}}

@auth
    АВТОРИЗОВАН
@endauth

@guest
    НЕ АВТОРИЗОВАН
@endguest

@endsection