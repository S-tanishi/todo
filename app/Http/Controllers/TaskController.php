<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;　// ★ 追加
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
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
     }

     /**
      * GET /folders/{id}/tasks/create
      */
      public function showCreateForm(int $id)
      {
          return view('task/create', [
              'folder_id' => $id
          ]);
      }
}
