@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="card-img">
                    <div class="card-body">
                        <h2 class="card-title text-center">{{ $project->title }}</h2>
                        <div class="d-flex justify-content-between pb-3">
                            <a href="{{ $project->site_link }}" class="btn btn-primary">{{ __('View Site') }}</a>
                            <a href="{{ $project->source_code }}" class="btn btn-success">{{ __('View Project') }}</a>
                        </div>
                        <p class="card-text"><strong>{{ __('Type:') }}</strong> {{ $project->type?->type }}</p>
                        <p class="card-text"><strong>{{ __('Description:') }}</strong> {{ $project->content }}</p>
                        <p class="card-text"><strong>{{ __('Date:') }}</strong> {{ $project->date_time }}</p>
                        <p class="card-text">
                            @foreach ($project->technologies as $technology)
                                <span class="badge bg-success">{{ $technology->name }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
