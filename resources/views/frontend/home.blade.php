@extends('layouts.frontend')

@section('content')
    <section id="wrapper--hero" class="section--page">
        <img id="profile-pic" src="{{ get_public_path() . get_setting('user_avatar') }}">

        <div>
            <h1 id="user-name">{{ get_setting('user_name') }}</h1>
            <p id="bio">{!! get_setting('user_bio') !!}</p>
            <p id="email">👉 {{ get_setting('user_email') }}</p>
        </div>
    </section>

    @if (count($data['sociallinks']) > 0)
        <section class="section--page">
            <div id="socials--list">
                @foreach ($data['sociallinks'] as $link)
                    <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
                @endforeach
                <a href="{{ get_public_path() . get_setting('user_resume') }}" target="_blank">View Resume</a>
                <a href="{{ get_public_path() . get_setting('user_resume') }}" target="_blank"
                    download="{{ get_setting('user_name') }}_Resume.pdf">Download
                    Resume</a>
            </div>
        </section>
    @endif

    @if (count($data['skills']) > 0)
        <section class="section--page">
            <h2>Skills & Qualifications</h2>
            <ul id="qualifications--list">
                @foreach ($data['skills'] as $skill)
                    <li>💡 {{ $skill->skill }}</li>
                @endforeach
            </ul>
        </section>
    @endif

    @if (count($data['techstacks']) > 0)
        <section class="section--page">
            <h2>Tech stack</h2>
            <div id="wrapper--techstack__items">
                @foreach ($data['techstacks'] as $stack)
                    <div class="card--techstack"><span>{{ $stack->techstack }}</span></div>
                @endforeach
            </div>
        </section>
    @endif

    @if (count($data['projects']) > 0)
        <section class="section--page">
            <h2>Projects & Accomplishments</h2>

            @foreach ($data['projects'] as $project)
                <div class="card--project">
                    <a href="{{ route('frontend.pages.projects.show', $project->slug) }}">
                        <span>🏆</span>
                        {{ $project->title }}
                    </a>
                </div>
            @endforeach
            <div class="card--project">
                <a href="{{ route('frontend.pages.projects.index') }}">
                    See All Projects
                </a>
            </div>
        </section>
    @endif

    @if (count($data['workhistories']) > 0)
        <section id="work-history-wrapper" class="section--page">
            <h2>Work History</h2>
            <div class="line-break"></div>
            @foreach ($data['workhistories'] as $work)
                <div class="card--work-history">
                    <strong>🚧 {{ $work->title }}</strong>
                    <p>{{ $work->duration }}</p>
                    {!! $work->description !!}
                </div>
                <div class="line-break"></div>
            @endforeach
        </section>
    @endif
@endsection
