<?php

namespace App\Http\Controllers;

use Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validar = Validator::make($request->all(),[
            'task' => 'required|max:800',
            'datetodo' => 'required',
            'priority' => 'required'
        ]);

        $data = $request->all();
        $user = \Auth::user()->id;
        $task = new Task;
        $task->task = $data['task'];
        $task->date_todo = $data['datetodo'];
        $task->priority = $data['priority'];
        $task->date_created = date('Y-m-d');
        $task->time_created = date('H:i:s');
        $task->user_id = $user;

        if ($task->save()) {
            return redirect('home');
        } else {
            return redirect('home');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($task)
    {
        $tarea = Task::find($task);
        $data = json_encode($tarea);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idtask = $request->edittasknum;
        $user   = \Auth::user()->id;
        $data = $request;
        $task = DB::table('tasks')->where([
                                            ['id',      '=', $idtask],
                                            ['user_id', '=', $user],
                                        ])
                                  ->update([
                                        'task'      => $data['edittask'],
                                        'date_todo' => $data['editdatetodo'], 
                                        'priority'  => $data['editpriority'],
                                    ]);

        $cont = count($task);
        if ($cont === 1) {
            return redirect('home');
        } else { 
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = $request->deletetasknum;
        $user   = \Auth::user()->id;
        $delete = DB::table('tasks')->where([
                                                ['id',      '=', $task],
                                                ['user_id', '=', $user],
                                            ])
                                    ->delete();

        $cont = count($delete);
        if ($cont === 1) {
            return redirect('home');
        } else { 
            return redirect('home');
        }
    }
}
