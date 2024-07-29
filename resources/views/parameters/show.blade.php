@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $parameter->title }}</h1>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $parameter->id }}</p>
            <p><strong>Title:</strong> {{ $parameter->title }}</p>
            <p><strong>Type:</strong> {{ $parameter->type }}</p>
            @if($parameter->icon)
                <p><strong>Icon:</strong></p>
                <img src="{{ Storage::url($parameter->icon) }}" class="img-thumbnail" width="100">
                <form method="POST" action="{{ route('parameters.destroyIcon', [$parameter, 'icon']) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete Icon</button>
                </form>
            @endif
            @if($parameter->icon_gray)
                <p><strong>Icon Gray:</strong></p>
                <img src="{{ Storage::url($parameter->icon_gray) }}" class="img-thumbnail" width="100">
                <form method="POST" action="{{ route('parameters.destroyIcon', [$parameter, 'icon_gray']) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete Icon Gray</button>
                </form>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('parameters.edit', $parameter) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection