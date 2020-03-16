<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Task;
use App\Status;
use App\Comment;
use Carbon\Carbon;

class ChangeController extends Controller
{
    public function edit(Request $request)
    {

                $title = strip_tags($request->all()['title']);
                $title = htmlspecialchars($title, ENT_QUOTES);
                $description = strip_tags($request->all()['description']);
                $description = htmlspecialchars($description, ENT_QUOTES);
                $status_id = $request->all()['status'];
                $id = strip_tags($request->all()['id']);

                $task = Task::find($id);

                $status = Status::find($status_id);
                $task->status()->associate($status);
                $task->title = $title;
                $task->description = $description;
                $task->created_at = Carbon::now();

                $task->save();

                $comments = new Comment();

                $task_id = Task::find($id);
                $comments->task()->associate($task_id);
                $comment = strip_tags($request->all()['comment']);
                $comment = htmlspecialchars($comment, ENT_QUOTES);

                $comments->description = $comment;
                $comments->id_task = $id;

                $comments->save();



        return redirect("http://my_site/admin/editing/{$id}");
    }
}
