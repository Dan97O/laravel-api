@extends('layouts.admin')


@section('content')
    <h1>Show posts table</h1>
    <a class="btn btn-dark" href="{{ route('admin.projects.create') }}" role="button">Create a new Project</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">


                @forelse ($projects as $project)
                    <tr class="table-primary">
                        <td scope="row">{{ $project->id }}</td>
                        <td><img height="100" src="{{ $project->cover_image }}" alt="{{ $project->title }}"></td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->id) }}"
                                role="button">
                                <i class="fas fa-eye fa-sm fa-fw"></i>
                            </a>
                            <a class="btn btn-secondary" href="{{ route('admin.projects.edit', $project->id) }}"
                                role="button">
                                <i class="fas fa-pencil fa-sm fa-fw"></i>
                            </a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $project->id }}">
                                <i class="fas fa-trash fa-sm fa-fw"></i>
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content text-black">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Delete: {{ $project->title }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            This is a destructive action
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary text-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                method="post">
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

                        </td>

                    </tr>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No posts yet.</td>

                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
