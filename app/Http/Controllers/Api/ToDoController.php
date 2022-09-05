<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToDoRequest;
use App\Models\Tasks;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToDoController extends Controller
{
    public function showAllToDo()
    {
        $tasksExist = DB::table('tasks')->where('done','=',Tasks::STATUS_NEW)->exists();

        if ($tasksExist){
            $tasks = Tasks::all();
            return response()->json($tasks,200);
        }


        return response()->json(['status'=>204,'message'=>'записей не найдено'],404);
    }

    public function getAllActiveTasks()
    {

        $tasksExist = DB::table('tasks')->where('done','=',Tasks::STATUS_NEW)->exists();

        if ($tasksExist){
            $tasks = DB::table('tasks')->where('done','=',Tasks::STATUS_NEW)->get();
            return response()->json($tasks,200);
        }
        return response()->json(['status'=>204,'message'=>'записей не найдено'],404);

    }
    public function getAllDoneTasks()
    {
        $tasksExist = DB::table('tasks')->where('done','=',Tasks::STATUS_DONE)->exists();

        if ($tasksExist){
            $tasks = DB::table('tasks')->where('done','=',Tasks::STATUS_DONE)->get();
            return response()->json($tasks,200);
        }
        return response()->json(['status'=>204,'message'=>'записей не найдено'],404);
    }

    public function deleteTask($taskId)
    {
        $task = Tasks::find($taskId);

        if ($task->done){
            $task->delete();
            return response()->json(['status'=>200,'message'=>'Запись успешно удалена'],200);
        }

        return response()->json(['status'=>204,'message'=>'записей не найдено или она находится в состоянии новое'],
            404);
    }

    public function finishTask($taskId)
    {
        $task = Tasks::find($taskId);


        if (!is_null($task)&&!$task->done){
            $task->done = Tasks::STATUS_DONE;
            $task->save();
            if ($task->wasChanged()) {
                return response()->json(['status'=>200,'message'=>'Задание выполнено'],200);
            }
        }

        return response()->json(['status'=>404,'message'=>'Не удалось завершить Задание из за проблем на сервере или задание уже завершено'],404);
    }

    public function addToDo(Request $request)
    {
        $requestData = $request->only(['name']);
        $validator = \Illuminate\Support\Facades\Validator::make($requestData,[
            'name'=>'required|string|max:20'
        ]);

        if (!$validator->fails()){
            $newTask = (new Tasks())->create($requestData);

            if ($newTask->exists) {
                return response()->json(['status'=>201,'message'=>'Задание добавлено успешно'],201);
            }
        }


        return response()->json(['status'=>404,'message'=>'Задание не добавлено из за проблем на сервере либо вы не прошли валидацию'],404);
    }
}
