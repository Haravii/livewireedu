<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function newTask()
    {
        return view('createTaskPage', [
            'title' => 'Создание задачи'
        ]);
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
