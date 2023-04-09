@extends('layouts.admin')
@section('title', 'Departemnts')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Projets</div>
                <div class="panel-body">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nouveau projet</a>
                    <hr>
    
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Priorité</th>
                                    <th>Avancement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->category }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td>{{ $project->priority }}</td>
                                        <td>{{ $project->progression }}%</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">Modifier</a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
    
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    