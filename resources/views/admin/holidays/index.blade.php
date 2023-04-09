@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Holidays</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holidays as $holiday)
                                    <tr>
                                        <td>{{ $holiday->name }}</td>
                                        <td>{{ $holiday->date }}</td>
                                        <td>{{ $holiday->day }}</td>
                                        <td>
                                            <a href="{{ route('admin.holidays.edit', $holiday->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                            <form action="{{ route('admin.holidays.destroy', $holiday->id) }}" method="POST" style="display: inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('admin.holidays.create') }}" class="btn btn-success">Add Holiday</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
