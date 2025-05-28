@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')

<div class="overflow-hidden w-75 mx-auto justify-content-md-end">
  <div class="text-end"><a href="{{ route('admin.newTask', ['userId' => $user->id]) }}" class="btn btn-primary text-end mb-3">Новая задача<a></div>
    <div class="card mb-3 text-center">
        <h5 class="card-header">Задачи</h5>
        <div class="card-body">
            <div class="card-text">
                <div class="row gy-4 gx-0">
    @foreach ($user->tasks()->get() as $task)
    <div class="col-6">
      <div class="card mb-3" style="width: 20rem;">
            <div class="card-body">
                <a href="{{ route('deleteTask', ['taskId' => $task->id]) }}" class="btn-close position-absolute top-0 end-0"></a>
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description ?? '' }}</p>
                <div class="dropdown">
                     <button class="btn dropdown-toggle {{ $task->status->btn_color }}" type="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        {{ $task->status->status_name }}
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($statuses as $status)
                        <li><a class="dropdown-item" href="{{ route('changeTaskStatus', ['taskId' => $task->id, 'statusId' => $status->id]) }}">{{ $status->status_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
       </div>
    </div>

    @endforeach
</div>
</div>
    </div>
  </div>
</div>

@endsection