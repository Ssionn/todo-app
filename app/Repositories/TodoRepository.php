<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class TodoRepository
{
    public function createTodo($todo)
    {
        return DB::table('todos')->insert([
            'title' => $todo,
            'is_finished' => 0,
            'user_id' => auth()->user()->id
        ]);
    }
}
