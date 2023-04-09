@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Project</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.projects.update', $project) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name', $project->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select id="category" class="form-control" name="category" required>
                                        <option value="web" {{ $project->category == 'web' ? 'selected' : '' }}>Web
                                        </option>
                                        <option value="mobile" {{ $project->category == 'mobile' ? 'selected' : '' }}>Mobile
                                        </option>
                                        <option value="desktop" {{ $project->category == 'desktop' ? 'selected' : '' }}>
                                            Desktop</option>
                                        <option value="other" {{ $project->category == 'other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" >

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                <label for="document" class="col-md-4 control-label">Document</label>

                                <div class="col-md-6">
                                    <input id="document" type="file" class="form-control" name="document">

                                    @if ($errors->has('document'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('document') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date"
                                        value="{{ $project->start_date }}" required>

                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">Date de fin</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control" name="end_date"
                                        value="{{ $project->end_date }}" required>

                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('budget') ? ' has-error' : '' }}">
                                <label for="budget" class="col-md-4 control-label">Budget</label>

                                <div class="col-md-6">
                                    <input id="budget" type="number" class="form-control" name="budget"
                                        value="{{ $project->budget }}" required>

                                    @if ($errors->has('budget'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('budget') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                <label for="priority" class="col-md-4 control-label">Priorité</label>

                                <div class="form-group">
                                    <div class="col-md-6">

                                        <label for="priority">Priority</label>
                                        <select class="form-control" id="priority" name="priority" required>
                                            <option value="">choice priority</option>
                                            <option value="highest"
                                                {{ $project->priority == 'highest' ? 'selected' : '' }}>
                                                highest</option>
                                            <option value="medium" {{ $project->priority == 'medium' ? 'selected' : '' }}>
                                                Medium
                                            </option>
                                            <option value="low" {{ $project->priority == 'low' ? 'selected' : '' }}>low
                                            </option>
                                            <option value="lowest" {{ $project->priority == 'lowestt' ? 'selected' : '' }}>
                                                lowest
                                            </option>
                                        </select>
                                    </div>
                                    @if ($errors->has('priority'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('priority') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description</label>

                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description" rows="4">{{ $project->description }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                update </button>
                                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
