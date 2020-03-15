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
        return view('admin.task',compact('statuses'));
    }

}
