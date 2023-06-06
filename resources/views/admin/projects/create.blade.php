@extends('layouts.admin')


@section('content')
    <h1 class="py-3">Create a new Project</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.projects.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                aria-describedby="titleHelper" placeholder="Add Title" value="{{ old('title') }}">
            <small id="titleHelper" class="form-text text-muted">Type the post
                title max 150 characters - must be
                unique</small>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Image</label>
            <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                id="cover_image" aria-describedby="cover_imageHelper" placeholder="Add img URL"
                value="{{ old('cover_image') }}">
            <small id="cover_imageHelper" class="form-text text-muted">Type the post cover_image max 150 characters - must
                be unique</small>
        </div>

        <div class="mb-3">
            <label for="date_time" class="form-label">Date</label>
            <input type="date" class="form-control @error('date_time') is-invalid @enderror" name="date_time"
                id="date_time" aria-describedby="date_timeHelper" placeholder="Add Date" value="{{ old('date_time') }}">
            <small id="date_timeHelper" class="form-text text-muted">Enter the creation date of the project</small>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6"
                value="{{ old('content') }}" placeholder="Add Description"></textarea>
        </div>


        <button type="submit" class="btn btn-dark">Save</button>

    </form>
@endsection
