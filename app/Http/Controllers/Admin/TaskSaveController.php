<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\DatabaseManager;
use App\Task;
use App\Status;

class TaskSaveController extends Controller
{
    public function create(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'description' => 'required'
        );

        $messages = array(
            'title.required' => 'Укажите название задачи',
            'description.required' => 'Укажите описание задачи'
        );

        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {

            try {
                $name = strip_tags($request->all()['title']);
                $name = htmlspecialchars($name, ENT_QUOTES);
                $description = strip_tags($request->all()['description']);
                $description = htmlspecialchars($description, ENT_QUOTES);
                $status_id = $request->all()['status'];



                $task = new Task();

                $task->title = $name;

                $status = Status::find($status_id);//2 строка
                $task->status()->associate($status);
                $task->description = $description;

                $task->save();

            } catch (\Exception $e) {

                Log::error($e->getMessage(), ['exception' => $e]);
            }
        }


        return redirect('http://my_site/admin/task');
    }
}
