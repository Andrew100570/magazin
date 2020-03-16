<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Status;
use App\Comment;

class EditingController extends Controller
{

    public function show($id, Request $request)
    {
        $task = Task::where('id', '=', $id)->first();
        $statuses = Status::all();
        $comments = Comment::all();

        return view('admin.editing',['task' => $task,'statuses'=>$statuses,
            'comments'=>$comments]);

    }
}
