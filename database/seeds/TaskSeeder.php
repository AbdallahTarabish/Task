<?php

use App\Task;
use App\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $task = new Task();
        $task->name = "Task 1";
        $task->priority = 2;
        $task->user_id = User::query()->first()->id;
        $task->save();
    }
}
