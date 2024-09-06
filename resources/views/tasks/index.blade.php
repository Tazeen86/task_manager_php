@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Create New Task</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul id="task-list" class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item" data-id="{{ $task->id }}">
                    <span>{{ $task->name }} (Priority: {{ $task->priority }})</span>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary float-right">Edit</a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right mr-2">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Sortable.js and JavaScript to handle drag-and-drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('task-list');
        var sortable = new Sortable(el, {
            animation: 150,
            onEnd: function () {
                var taskOrder = [];
                document.querySelectorAll('#task-list li').forEach(function (li, index) {
                    taskOrder.push({
                        id: li.getAttribute('data-id'),
                        priority: index + 1  // Assign new priority based on order
                    });
                });

                // Send the reordered tasks to the server via AJAX
                fetch('{{ route("tasks.reorder") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ taskOrder: taskOrder })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Task priorities updated successfully.');
                        location.reload();  // Reload the page to reflect changes
                    }
                });
            }
        });
    });
</script>
@endsection
