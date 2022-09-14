@extends('layouts.frontend')

@section('content')
    <a href="{{ url()->previous() }}">&#x2190; Go Back</a>
    <h1>All Projects</h1>

    <section class="section--page">
        @if (count($data['projects']) > 0)
            @foreach ($data['projects'] as $project)
                <div class="card--project">
                    <a href="{{ route('frontend.pages.projects.show', $project->slug) }}">
                        <span>🏆</span>
                        {{ $project->title }}
                    </a>
                </div>
            @endforeach
        @else
            <div class="card--project">
                <span>
                    No Projects
                </span>
            </div>
        @endif
    </section>
@endsection
