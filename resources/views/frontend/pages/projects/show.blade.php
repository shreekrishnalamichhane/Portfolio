@extends('layouts.frontend')

@section('content')
    <a href="{{ url()->previous() }}">&#x2190; Go Back</a>
    <h1>{{ $data['project']?->title }}</h1>

    <ul>
        @if ($data['project']?->source !== null)
            <li><a href="{{ $data['project']?->source }}">Source Code</a></li>
        @endif
        @if ($data['project']?->demo !== null)
            <li><a href="{{ $data['project']?->demo }}">Live Demo</a></li>
        @endif
    </ul>

    {!! $data['project']?->description !!}
@endsection
