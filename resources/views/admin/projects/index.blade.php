@extends('layouts.admin')


@section('content')
    <h1>Show posts table</h1>
    <a class="btn btn-dark" href="{{ route('admin.projects.create') }}" role="button">Create Post</a>

    {{--  @include('partials.session_message') --}}

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

                            VIEW/EDIT/DELETE

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
