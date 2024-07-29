@extends('layouts.app')

@section('content')
    <h1>Parameters</h1>
    <form method="GET" action="{{ route('parameters.index') }}" class="form-inline mb-3">
        <input type="text" name="id" placeholder="ID" value="{{ request('id') }}" class="form-control mr-2">
        <input type="text" name="title" placeholder="Title" value="{{ request('title') }}" class="form-control mr-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parameters as $parameter)
            <tr>
                <td>{{ $parameter->id }}</td>
                <td>{{ $parameter->title }}</td>
                <td>{{ $parameter->type }}</td>
                <td>
                    <a href="{{ route('parameters.show', $parameter) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('parameters.edit', $parameter) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection