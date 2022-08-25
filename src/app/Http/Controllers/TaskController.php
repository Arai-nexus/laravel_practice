<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    // ToDo一覧表示
    public function index(Folder $folder)
    {
        $folders = Auth::user()->folders()->get();

        // すべてのフォルダを取得する
        $folders = Folder::all();

        // 選ばれたフォルダを取得する
        // $current_folder = Folder::find($id);

        // if (is_null($current_folder)) {
        //     abort(404);
        // }

        // 選ばれたフォルダに紐づくタスクを取得する
        // $tasks = Task::where('folder_id', $current_folder->id)->get();
        // 上記同じ書き方
        $tasks = $folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder->id,
            'tasks' => $tasks,
        ]);
    }

    // タスクの新規作成
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
    
    // ToDo一覧表示
    public function create(int $id, CreateTask $request)
    {
        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);
        
        // 編集されたタスク内容を代入
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        
        // 編集内容を更新
        $current_folder->tasks()->save($task);
        
        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ])->with('flash_message', '投稿が完了しました');
    }

    // タスク編集ページへ遷移
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    // タスク編集処理
    public function edit(int $id, int $task_id, EditTask $request)
    {
        $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;

        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ])->with('flash_message', '投稿が完了しました');
    }
}