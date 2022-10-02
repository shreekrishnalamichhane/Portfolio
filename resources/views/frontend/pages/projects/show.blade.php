@extends('layouts.frontend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.shreekrishnalamichhane.com.np/ShareMe/dist/index.min.css">
@endsection
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
    <script src="https://cdn.shreekrishnalamichhane.com.np/ShareMe/dist/index.min.js"></script>
    <script>
        new ShareMe('.share_me_inline', {
            style: "inline",
            modalOverlayColor: "rgb(0,0,0,0.5)",
            modalBgColor: "white",
            modalTextColor: "black",
            primaryButtons: "facebook,twitter,pinterest,skype,whatsapp",
            modalButtons: "blogger,facebook,gmail,linkedin,messenger,pinterest,print,skype,telegram,twitter,viber,whatsapp",
        });
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
    <hr>
    <span>Share this article :
        <div class="share_me_inline" style="padding:15px 0;">
        </div>
    </span>
    <hr>
@endsection
