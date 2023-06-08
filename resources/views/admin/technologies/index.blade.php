@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="types_title text-center">Technologies</h2>
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 my-3 g-4">
            @forelse ($technologies as $technology)
                <div class="col">
                    <div class="card shadow border-0">
                        <img src="https://images.unsplash.com/photo-1686169505874-633b512546cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            class="card-img-top" alt="{{ $technology->name }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $technology->name }}</h4>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info" role="alert">
                        No technologies found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
