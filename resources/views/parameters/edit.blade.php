@extends('layouts.app')

@section('content')
    <h1>Edit {{ $parameter->title }}</h1>
    <form method="POST" action="{{ route('parameters.update', $parameter) }}" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $parameter->title }}">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control">
                <option value="1" {{ $parameter->type == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $parameter->type == 2 ? 'selected' : '' }}>2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" name="icon" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="icon_gray">Icon Gray</label>
            <input type="file" name="icon_gray" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection