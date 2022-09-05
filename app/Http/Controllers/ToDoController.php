<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToDoRequest;
use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use PDO;

class ToDoController extends Controller
{
    public function addToDo(AddToDoRequest $addToDoRequest)
    {
        $newTask = (new Tasks())->create($addToDoRequest->only('name'));

        if ($newTask->exists) {
            return redirect()->route('allToDo')->with('success', 'Задание создано успешно');
        }

        return redirect()->route('allToDo')->with(
            ['header' => 'Не удалось создать Задание из за проблем на сервере']
        );
    }

    public function showAllToDo()
    {

        return view('sections.toDoList', ['tasks' => Tasks::all()]);
    }

    public function deleteTask($taskId)
    {
        $task = Tasks::find($taskId);
        if ($task->done){
            $task->delete();
            return redirect()->route('allToDo')->with('success', 'Задание удалено успешно');
        }

        return redirect()->route('allToDo')->with(
            ['header' => 'Не удалось удалить Задание из за проблем на сервере или оно не завершено']
        );
    }

    public function finishTask($taskId)
    {
        $task = Tasks::find($taskId);

        if (!$task->done){
            $task->done = Tasks::STATUS_DONE;
            $task->save();
            if ($task->wasChanged()) {
                return redirect()->route('allToDo')->with('success', 'Задание выполнено');
            }
        }

        return redirect()->route('allToDo')->with(
            ['header' => 'Не удалось завершить Задание из за проблем на сервере или задание уже завершено']
        );
    }
    public function getAllActiveTasks()
    {

        $tasks = DB::table('tasks')->where('done','=',Tasks::STATUS_NEW)->get();

        return view('sections.toDoList', ['tasks' => $tasks]);

    }
    public function getAllDoneTasks()
    {
        $tasks = DB::table('tasks')->where('done','=',Tasks::STATUS_DONE)->get();

        return view('sections.toDoList', ['tasks' => $tasks]);
    }
}
