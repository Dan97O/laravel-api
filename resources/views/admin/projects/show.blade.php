@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h2 class="title">{{ $project->title }}</h2>
                <p> {{ $project->type?->type }} </p>
                <p class="description">{{ $project->content }}</p>
                <div class="buttons d-flex justify-content-between">
                    <a href="{{ $project->site_link }}" class="btn btn-primary">{{ __('View Site') }}</a>
                    <a href="{{ $project->source_code }}" class="btn btn-primary">{{ __('View Project') }}</a>
                </div>
                <p class="date pt-3">{{ __('Date:') }} {{ $project->date_time }}</p>
                <p> {{ $project->technology_id?->name }} </p>
            </div>
        </div>
    </div>
@endsection
