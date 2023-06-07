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
                    <input type="text" class="form-control" placeholder="Full Stack" aria-label="Button" name="type"
                        id="type">
                    <button class="btn btn-outline-secondary" type="submit">Add</button>
                </div>

            </form>
        </div>
        <div class="col-6">

            <div class="table-responsive-md">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Types Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row">{{ $type->id }}</td>
                                <td>{{ $type->type }}</td>
                                <td>{{ $type->slug }}</td>
                                <td>
                                    <span class="badge bg-dark">{{ $type->projects?->count() }}</span>

                                </td>
                                <td>
                                    <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
