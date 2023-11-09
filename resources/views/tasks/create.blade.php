@extends('layouts.app')

@section('content')
<h1>Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <input type="number" name="priority" id="priority" placeholder="Enter priority. eg. 1" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection