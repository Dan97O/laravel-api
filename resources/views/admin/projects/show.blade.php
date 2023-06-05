@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <div class="row my-5 py-5">
            <div class="col d-flex justify-content-center py-2">
                <div class="card text-center w-50 shadow my-5 bg-dark">
                    <div class="card-img-top">
                        <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="img-fluid">
                    </div>
                    <div class="card-body text-white">
                        <h5 class="card-title">Title: {{ $project->title }}</h5>
                        <p class="card-text">Description: {{ $project->content }}</p>
                        <p class="card-text">Date: {{ $project->date_time }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
