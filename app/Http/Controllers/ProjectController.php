<?php 

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Display a listing of projects
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Show the form for creating a new project
    public function create()
    {
        return view('projects.create');
    }

    // Store a newly created project in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
    
        Project::create($request->all());  // Only 'name' is mass assignable
    
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }
    

    // Show the form for editing the specified project
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Update the specified project in storage
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    // Remove the specified project from storage
    public function destroy(Project $project)
    {
        // Delete all tasks related to the project
        $project->tasks()->delete();
    
        // Now delete the project
        $project->delete();
    
        return redirect()->route('projects.index')->with('success', 'Project and its associated tasks deleted successfully.');
    }
    
}
