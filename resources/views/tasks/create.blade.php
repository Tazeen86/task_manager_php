@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create New Task</div>
            <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
    @csrf  <!-- This generates the _token field automatically -->
    <div class="form-group">
        <label for="name">Task Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <input type="number" name="priority" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="project_id">Project</label>
        <select name="project_id" class="form-control" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create Task</button>
</form>

            </div>
        </div>
    </div>
</div>
@endsection

