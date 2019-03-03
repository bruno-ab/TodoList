<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $dsn = 'mysql:dbname=default;host=mysql';
        $user = 'default';
        $password = 'secret';

        try {
            $dbh = new \PDO($dsn, $user, $password);
            var_Dump($dbh);die;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function taskForm()
    {
        return view('taskcreate');
    }

    public function taskEditForm($id)
    {
        $task = Task::find($id);
    
        return view('taskedit', compact('task'));
    }

    public function addTask(Request $request)
    {
       
        $task = new Task();
        $task->name         = $request->name;
        $task->description  = $request->description;
        $task->date         = $this->convertDate($request->date);
        $task->save();
     
      
        return redirect()->route('tasks')->with('message', 'Tarefa adicionada.');
    }

    public function updateTask(Request $request)
    {
        $task               = Task::find($request->id);
        $task->name         = $request->name;
        $task->description  = $request->description;
        $task->date         = $this->convertDate($request->date);
        $task->save();
          
        return redirect()->route('tasks')->with('message', 'Tarefa atualizada.');
    }

    public function deleteTask($id)
{
     $task = Task::find($id);
     $task->delete();

    return redirect()->route('tasks')->with('message', 'Tarefa removida.');
}

    public function getTasks()
    {
        $tasks = Task::latest()->paginate(5);
       
        return view('tasklist',compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    function convertDate($date) {
        // EN-Date to GE-Date
        if (strstr($date, "-") || strstr($date, "/"))   {
                $date = preg_split("/[\/]|[-]+/", $date);
                $date = $date[2].".".$date[1].".".$date[0];
                return $date;
        }
        // GE-Date to EN-Date
        else if (strstr($date, ".")) {
                $date = preg_split("[.]", $date);
                $date = $date[2]."-".$date[1]."-".$date[0];
                return $date;
        }
        return false;
    }
}
