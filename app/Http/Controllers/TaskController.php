<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    // Fetch tasks ordered by priority
    $tasks = Task::orderBy('priority', 'asc')->get();
    $projects = Project::all();

    return view('tasks.index', compact('tasks', 'projects'));
}


    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', ['projects' => $projects]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id',
        ]);
    
        Task::create($request->only('name', 'priority', 'project_id'));  // Only 'name', 'priority', and 'project_id' are stored
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', ['task' => $task, 'projects' => $projects]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    

    public function filterByProject(Request $request)
{
    $projectId = $request->input('project_id'); // Get project_id from query string
    $tasks = Task::where('project_id', $projectId)->orderBy('priority', 'asc')->get();
    $projects = Project::all(); // Retrieve all projects for the dropdown

    return view('tasks.index', compact('tasks', 'projects'));
}
public function reorder(Request $request)
{
    $taskOrder = $request->input('taskOrder');

    // Loop through each task and update its priority
    foreach ($taskOrder as $taskData) {
        $task = Task::find($taskData['id']);  // Find task by its ID
        $task->priority = $taskData['priority'];  // Update its priority
        $task->save();  // Save changes to the database
    }

    return response()->json(['success' => true]);  // Return success response
}


}
