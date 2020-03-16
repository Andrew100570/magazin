<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Status;
use App\Task;
use App\Comment;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        $todo = Task::where('id_status', '=', 1)->orderBy('created_at','ASC')->get();
        $doing = Task::where('id_status', '=', '2')->orderBy('created_at','ASC')->get();
        $done = Task::where('id_status', '=', '3')->orderBy('created_at','ASC')->get();

        $commentCount = DB::table('tasks')
            ->select(DB::raw('count(comments.id_task) as comments_count, tasks.id'))
            ->leftJoin('comments', 'tasks.id', '=', 'comments.id_task')
            ->groupBy('tasks.id')
            ->get()
            ->keyBy('id')
            ->toArray();

        return view('admin.task',
            compact(['statuses', 'todo', 'doing', 'done', 'commentCount']));
    }

}
