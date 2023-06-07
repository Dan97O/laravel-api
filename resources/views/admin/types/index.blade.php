@extends('layouts.admin')

@section('content')
    <h1 class="text-muted display-5 py-3">Categories Page</h1>

    @include('partials.validation_errors')
    @include('partials.session_message')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.types.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-secondary border-0 text-white" placeholder="Full Stack"
                        aria-label="Button" name="type" id="type">
                    <button class="btn ms-1 btn-secondary text-white" type="submit">Add</button>
                </div>

            </form>
        </div>
        <div class="col-6">

            <div class="table-responsive-md">
                <table class="table table-secondary table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Types Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row">{{ $type->id }}</td>
                                <td>{{ $type->type }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>
                                    <span class="badge bg-dark">{{ $type->projects?->count() }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $type->id }}">
                                        <i class="fas fa-trash fa-sm fa-fw"></i>
                                    </button>
                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">Delete: {{ $type->type }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    This is a destructive action
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete">
                                                            <i class="fas fa-trash fa-sm fa-fw"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Optional: Place to the bottom of scripts -->
                                    <script>
                                        const myModal = new bootstrap.Modal(document.getElementById('modal-{{ $type->id }}'), options)
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
@endsection
