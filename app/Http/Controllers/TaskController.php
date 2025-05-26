<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Status;

class TaskController extends Controller
{   

    public function deleteTask()
    {
        $delete = Task::find(request()->taskId);

        $delete->delete();

        $delete->trashed();

        return redirect()->route('index'); 
    }

    public function changeTaskStatus() // taskId statusId
    {
        $task = Task::find(request()->taskId);

        $task->status()->associate(request()->statusId);

        $task->save();

        return redirect()->route('index');
    }

    public function newTask()
    {
        $statuses = Status::get();

        return view('createTaskPage', [
            'title' => 'Создание задачи',
            'statuses' => $statuses
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
        $status->btn_color = request()->btnColor;

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
