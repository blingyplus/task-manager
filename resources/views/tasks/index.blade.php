@extends('layouts.app')

@section('content')


<h1 class="mt-4">Task Manager</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary mx-2 mb-3">Create Task</a>

@if(!is_null($tasks) && count($tasks) > 0)
<table id="task-table" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Priority</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr data-task-id="{{ $task->id }}">
            <td>{{ $task->name }}</td>
            <td>{{ $task->priority }}</td>
            <td>{{ $task->created_at }}</td>
            <td>{{ $task->updated_at }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No tasks available.</p>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
        $(function() {
            $("#task-table tbody").sortable({
                update: function(event, ui) {
                    var taskIds = [];
                    $(this).find("tr").each(function(index) {
                        $(this).attr("data-task-priority", index + 1);
                        taskIds.push($(this).data("task-id"));
                    });

                    // Send updated task order to the server
                    $.ajax({
                        url: "{{ route('tasks.updateOrder') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            taskIds: taskIds
                        },
                        success: function(response) {
                            toastr.success('Task order updated successfully');
                        },
                        error: function(xhr) {
                            toastr.error('An error occurred while updating task order');
                        }
                    });
                }
            }).disableSelection();
        });
    </script>
@endsection
