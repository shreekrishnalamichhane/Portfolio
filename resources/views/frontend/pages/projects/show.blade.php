@extends('layouts.frontend')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js"></script>
    <script>
        let imgs = document.querySelectorAll('img');
        mediumZoom(imgs, {
            margin: 24,
            background: '',
            scrollOffset: 0,
        })
    </script>
@endsection
@section('content')
    <a href="{{ url()->previous() }}">&#x2190; Go Back</a> |
    <a href="{{ route('frontend.pages.homepage.show') }}"> Home</a>
    <h1>{{ $data['project']?->title }}</h1>
    <img style="width: 100%; border-radius:10px;" src="{{ get_public_path() . $data['project']?->cover_img }}" alt="">
    <ul>
        @if ($data['project']?->source !== null)
            <li><a href="{{ $data['project']?->source }}">Source Code</a></li>
        @endif
        @if ($data['project']?->demo !== null)
            <li><a href="{{ $data['project']?->demo }}">Live Demo</a></li>
        @endif
    </ul>

    <div class="content">
        {!! $data['project']?->description !!}
    </div>
@endsection
