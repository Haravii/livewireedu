<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Status;

class TaskController extends Controller
{
    public function newTask()
    {
        return view('createTaskPage', [
            'title' => 'Создание задачи'
        ]);
    }

    public function newStatus()
    {
        return view('admin.createStatusPage', [
            'title' => 'Создание Статуса'
        ]);
    }

    public function createNewStatus()
    {
        $status = new Status;

        $status->status_name = request()->name;

        $status->save();

        return redirect()->route('admin.newStatus');
    }

    public function createNewTask() // userId title description statusId
    {
        $validatedData = request()->validate([
            'userId' => ['required'],
            'title' => ['required'],
            'statusId' => ['required'],
        ]);

        $task = new Task;

        $task->user()->associate(request()->userId);
        $task->title = $validatedData['title'];
        $task->description = request()->description;
        $task->status_id = $validatedData['statusId'];

        $task->save();

        return redirect()->route('index');
    }
}
