<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Status;
use App\Task;


class TaskController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        $taskOne = Task::where('id_status', '=', 1)->get();
        $taskTwo = Task::where('id_status','=','2')->get();
        $taskThree = Task::where('id_status','=','3')->get();
        return view('admin.task',
            compact(['statuses','taskOne','taskTwo','taskThree']));
    }

}
