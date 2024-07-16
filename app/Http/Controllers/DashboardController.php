<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Repositories\TodoRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected TodoRepository $todoRepository
    ) {}

    public function index()
    {
        $todos = auth()->user()->todos;

        return view('dashboard', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'string|max:255'
        ]);

        $this->todoRepository->createTodo($request->todo);

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return redirect()->back();
    }
}
