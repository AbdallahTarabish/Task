<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::query()->select('id', 'name', 'priority', 'status')->paginate(10);
        if ($tasks->count() > 0) {
            success('Tasks', $tasks);
        } else {
            error('No tasks found');
        }
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
    public function store(TaskRequest $request)
    {

        $task = Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'user_id' => auth()->user()->id,
        ]);
        if ($task) {
            return success('Task created successfully');
        } else {
            return error('Something went wrong');
        }
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
        if ($task) {
            $task->update([
                'name' => $request->name,
                'priority' => $request->priority,
            ]);

            return success('Task updated successfully');
        } else {
            return error('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ($task) {
            $task->delete();
            return success('Task deleted successfully');
        } else {
            return error('Something went wrong');
        }
    }
}
