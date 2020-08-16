<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\CreateTask;
use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index(ini $id)
    {
        // すべてのフォルダを取得する
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(ini $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(ini $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    
    }

    /**
     *  GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm(int $id, int $task_id)
    {
        $task =Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }
}