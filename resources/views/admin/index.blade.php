@extends('layouts.admin')

@section('content')
    <div class="">
        @foreach ($todos as $todo)
            <div class="border border-secondary text-secondary shadow-sm rounded p-3 mb-3 row m-0 align-items-center">
                <div class="col-8">
                    <form action="{{ route('admin.todos.toggleStatus', $todo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit"
                            class="badge mb-2 rounded-pill {{ $todo->status === 'pending' ? 'bg-danger' : 'bg-success' }}">
                            {{ $todo->status }}
                        </button>
                    </form>
                    <h5>{{ $todo->description }}</h5>
                    <small class=" text-secondary">Created: {{ $todo->created_at }}</small><br>
                    <small class=" text-secondary">Update: {{ $todo->updated_at }}</small>
                </div>
                <div class="col-4 text-end">
                    <a href="{{ route('admin.todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $todo->id }}">Delete</a>
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId-{{ $todo->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Delete ToDo
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">Are you sure?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <form action="{{ route('admin.todos.destroy', $todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Optional: Place to the bottom of scripts -->
                    <script>
                        const myModal = new bootstrap.Modal(
                            document.getElementById("modalId"),
                            options,
                        );
                    </script>

                </div>
            </div>
        @endforeach
    </div>
@endsection
