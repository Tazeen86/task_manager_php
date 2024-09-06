@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create Project</div>
            <div class="card-body">
            <form action="{{ route('projects.store') }}" method="POST">
    @csrf  <!-- This generates the _token field automatically -->
    <div class="form-group">
        <label for="name">Project Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter project name" required>
    </div>
    <button type="submit" class="btn btn-success">Create Project</button>
</form>

            </div>
        </div>
    </div>
</div>
@endsection
