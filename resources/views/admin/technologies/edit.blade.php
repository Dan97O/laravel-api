@extends('layouts.admin')


@section('content')
    <h1 class="py-3 text-center">Edit Project</h1>


    @include('partials.validation_errors')

    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form action="{{ route('admin.technologies.update', $technology) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" aria-describedby="nameHelper" value="{{ $technology->name }}">
                    <small id="nameHelper" class="form-text text-muted">
                        Type the technology name max 50 characters - must be
                        unique
                    </small>
                </div>
                {{--    <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" aria-describedby="imageHelper" value="{{ $technology->image }}">
                    <small id="imageHelper" class="form-text text-muted">
                        Type the Project Cover Image
                    </small>
                </div> --}}
                <div>
                    <img style="width: 80px" src="{{ 'http://127.0.0.1:8000/storage/' . $technology->image }}"
                        alt="">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" aria-describedby="helpId">
                        <small id="helpId" class="form-text text-muted">Cover Image</small>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
