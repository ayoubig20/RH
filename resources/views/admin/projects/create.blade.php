@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Project</div>

                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data"method="POST"
                            action="{{ route('admin.projects.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>

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
                                        <option value="">Select a category</option>
                                        <option value="web" {{ old('category') == 'web' ? 'selected' : '' }}>Web</option>
                                        <option value="mobile" {{ old('category') == 'mobile' ? 'selected' : '' }}>Mobile
                                        </option>
                                        <option value="desktop" {{ old('category') == 'desktop' ? 'selected' : '' }}>Desktop
                                        </option>
                                        <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other
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
                                <label for="start_date" class="col-md-4 control-label">Date de début</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date"
                                        value="{{ old('start_date') }}" required>

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
                                        value="{{ old('end_date') }}" required>

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
                                        value="{{ old('budget') }}" required>

                                    @if ($errors->has('budget'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('budget') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">

                                <div class="form-group">
                                    <div class="col-md-6">

                                        <label for="priority">Priority</label>
                                        <select class="form-control" id="priority" name="priority" required>
                                            <option value="">choice Priority</option>
                                            <option value="highest" {{ old('priority') == 'highest' ? 'selected' : '' }}>
                                                highest</option>
                                            <option value="Medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                Medium
                                            </option>
                                            <option value="High" {{ old('priority') == 'low' ? 'selected' : '' }}>low
                                            </option>
                                            <option value="High" {{ old('priority') == 'lowest' ? 'selected' : '' }}>
                                                lowest
                                            </option>
                                        </select>
                                    </div>
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
                                    <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        create project </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
