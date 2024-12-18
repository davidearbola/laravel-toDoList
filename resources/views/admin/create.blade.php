@extends('layouts.admin')

@section('content')
    <div class="">
        <form action="{{ route('admin.todos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label text-secondary">Add new ToDo</label>
                <input type="text" class="form-control bg-dark text-secondary" id="description" name="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
