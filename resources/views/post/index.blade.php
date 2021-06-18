@extends('templates.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
@endsection

@section('title', 'Post')

@section('content')

    <div class="col-lg-2 col-sm-6">
        @include('templates._sidebar_left')
    </div>

    <div class="col">
        <div class="shadow card mb-3">
            <div class="card-body">
                @if (session('pesan'))
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session('pesan') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="" action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="title..." value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                            placeholder="what your idea ?" rows="3">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Share</button>
                </form>
            </div>
        </div>

        @foreach ($posts as $post)
            <div class="shadow card mb-3">
                <div class="card-header">
                    <img src="{{ $post->user->avatar }}" alt="" class="rounded-circle shadow">
                    <strong>{{ $post->user->name }}</strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 mt-2">
                            <a href="{{ count($post->comments) ? route('posts.show', $post->id) : '#' }}"
                                class="text-decoration-none text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Comments">
                                <span class="material-icons">
                                    question_answer
                                </span>
                                <sup>{{ count($post->comments) }}</sup>
                            </a>
                            <span class="material-icons" data-bs-toggle="tooltip" data-bs-placement="top" title="Likes">
                                thumb_up
                            </span>
                            <sup>10</sup>
                            <span class="material-icons" data-bs-toggle="tooltip" data-bs-placement="top" title="Shares">
                                share
                            </span>
                            <sup>2</sup>
                        </div>
                        <div class="col mb-1">
                            <form action="{{ route('comments.store') }}" method="post" class="">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="input-group input-group-sm">
                                    <input name="comment{{ $post->id }}" type="text"
                                        class="form-control @error('comment' . $post->id) is-invalid @enderror"
                                        placeholder="comment . . ." @error('comment' . $post->id) data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="{{ $message }}"
                                    @enderror>
                                    <button type="submit" class="btn btn-outline-primary" type="button">
                                        <span class="material-icons">send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->links('templates._pagination') }}
    </div>

    <div class="col-lg-2 col-sm-12">
        @include('templates._sidebar_right')
    </div>
@endsection

@section('js')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

    </script>
@endsection
