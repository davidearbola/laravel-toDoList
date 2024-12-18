<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::where('user_id', $user->id)->get();
        return view('admin.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
        ]);

        $user = Auth::user();
        $data['user_id'] = $user->id;

        $newToDo = new Todo();
        $newToDo->fill($data);
        $newToDo->save();

        return redirect()->route('admin.todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return redirect()->route('admin.todos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('admin.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'description' => 'required',
        ]);

        $todo->update($data);

        return redirect()->route('admin.todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('admin.todos.index');
    }

    public function toggleStatus($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = $todo->status === 'pending' ? 'completed' : 'pending';
        $todo->save();

        return redirect()->route('admin.todos.index');
    }
}
