<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::orderBY('id','desc');

        return view('tasks.index')->width('storedTasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'taskName' => 'required|min:5|max:200',
        ]);

        $task = new Task;

        $task->name = $request->taskName;

        $task->save();

        Session::flash('success', 'Task has been successfully added!');

        return redirect()->route('tasks.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::find($task);

        return view('tasks.edit')->width('taskUnderEdit', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
               'updatedTask' => 'required|min:5|max:200',
        ]);

        $task = Task::find($task);

        $task->name = $request->updatedTask;

        $task->save();

        Session::flash('success', 'Task' . $task . 'has been successfully updated.');

        return redirect()->root('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = Task::find($task);

        $task->delete();

        Session::flash('success', 'Task' . $task . 'has been successfully deleted.');

        return redirect()->route('tasks.index');
    }
}
