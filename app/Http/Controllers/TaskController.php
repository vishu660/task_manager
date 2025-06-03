<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit($id)
{
    $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('tasks.edit', compact('task'));
}


    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
    ]);

    $task->update($request->only(['title', 'description']));

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    public function complete(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }
}
