@extends('layouts.admin')

@section('content')
    <div class="">
        <form action="{{ route('admin.todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="description" class="form-label text-secondary">Edit ToDo</label>
                <input type="text" class="form-control bg-dark text-secondary" id="description" name="description"
                    value="{{ $todo->description }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
