@extends('layouts.admin')


@section('content')
    <style>
        .img {
            width: 100px;
            object-fit: contain;
        }
    </style>
    <h1 class="mt-3">Show posts table</h1>
    <a class="btn btn-secondary my-3 text-end" href="{{ route('admin.projects.create') }}" role="button">Create a new
        Project</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
            <thead class="table-dark shadow">
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th>Technology</th>
                    <th>Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($projects as $project)
                    <tr class="table-dark table-striped table-hover">
                        <td scope="row">{{ $project->id }}</td>
                        <td><img class="img" height="100"
                                src="{{ 'http://127.0.0.1:8000/storage/' . $project->cover_image }}"
                                alt="{{ $project->title }}"></td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->type?->type }}</td>
                        <td>
                            @foreach ($project->technologies as $technology)
                                {{ $technology->name }}
                            @endforeach
                        </td>
                        <td>{{ $project->date_time }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}"
                                role="button">
                                <i class="fas fa-eye fa-sm fa-fw"></i>
                            </a>
                            <a class="btn btn-secondary" href="{{ route('admin.projects.edit', $project->slug) }}"
                                role="button">
                                <i class="fas fa-pencil fa-sm fa-fw"></i>
                            </a>

                            <!-- Modal trigger button -->
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
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="modalTitleId">Delete:
                                                {{ $project->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            This is a destructive action
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.projects.destroy', $project->slug) }}"
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

                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('modal-{{ $project->id }}'), options)
                            </script>
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
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
