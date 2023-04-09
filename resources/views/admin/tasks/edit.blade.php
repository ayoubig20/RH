@extends('layouts.admin')

@section('content')
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="assigned_to">Assigned To:</label>
            <select name="assigned_to" id="assigned_to" class="form-control" required>
                <option value="">Select an employee</option>

                @foreach ($viewData['employees']  as $employee)
                    <option value="{{ $employee->id }}" {{ $task->assigned_to == $employee->id ? 'selected' : '' }}>
                        {{ $employee->firstName }} {{ $employee->lastName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select a project</option>

                @foreach ($viewData['projects'] as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $task->start_date }}">
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $task->end_date }}">
        </div>

        <button type="submit" class="btn btn-primary">Update
    </form>
@endsection
