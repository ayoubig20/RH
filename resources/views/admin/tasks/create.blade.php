@extends('layouts.admin')

@section('content')
    <h1>Create New Task</h1>

    <form method="POST" action="{{ route('admin.tasks.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigned To:</label>
            <select name="assigned_to" id="assigned_to" class="form-control" required>
                <option value="">assigned_to</option>

                @foreach ($viewData['employees'] as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->firstName}} {{ $employee->lastName}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control" >
                @foreach ( $viewData['projects'] as $project)
                    <option value="">project refernce</option>

                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>        
        </div>
        

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        {{-- <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="incomplete">Incomplete</option>
                <option value="in_progress">In Progress</option>
                <option value="complete">Complete</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
