@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Task</div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Task Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" name="priority" class="form-control" value="{{ $task->priority }}" required>
                    </div>
                    <div class="form-group">
                        <label for="project_id">Project</label>
                        <select name="project_id" class="form-control" required>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>

                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="
