@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row my-5">
            @if (session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <h2 class="types_title text-center mb-5">Technologies</h2>

            <div class="col-6">
                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-secondary border-0 text-white"
                            placeholder="Add technologies" aria-label="Button" name="name" id="name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-secondary border-0 text-white" placeholder="Add image"
                            aria-label="Button" name="image" id="image">
                        <button class="btn ms-1 btn-secondary text-white" type="submit">
                            Add
                        </button>
                    </div>
                </form>
            </div>


            <div class="col-6">
                <div class="table-responsive-md">
                    <table class="table table-secondary table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name Technology</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Types Count</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @forelse ($technologies as $technology)
                                <tr class="">
                                    <td scope="row">{{ $technology->id }}</td>
                                    <td>{{ $technology->name }}</td>
                                    <td>{{ $technology->slug }}</td>
                                    <td>
                                        <span class="badge bg-dark">{{ $technology->projects?->count() }}</span>
                                    </td>
                                    <td>
                                        @if ($technology->image)
                                            <img width="100" src=" {{ $technology->image }}"
                                                alt=" {{ $technology->name }}">
                                        @else
                                            <img width="100"
                                                src="https://images.unsplash.com/photo-1686169505874-633b512546cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                                class="img-fluid" alt="{{ $technology->name }}">
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $technology->id }}">
                                            <i class="fas fa-trash fa-sm fa-fw"></i>
                                        </button>
                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="deleteModal-{{ $technology->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modal-{{ $technology->name }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-{{ $technology->name }}">Modal
                                                            title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        This is a destructive action
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('admin.technologies.destroy', $technology) }}"
                                                            method="post">
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
                                            const myModal = new bootstrap.Modal(document.getElementById('modal-{{ $technology->id }}'), options)
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <tr class="">
                                    <td scope="row"> 👈 Add your first category </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
