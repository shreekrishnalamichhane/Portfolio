@extends('layouts.frontend')

@section('content')
    <section id="wrapper--hero" class="section--page">
        <img id="profile-pic" src="./assets/images/profile_pic.JPG">

        <div>
            <h1 id="user-name">Dennis Ivanov</h1>
            <p id="bio">Software developer, developer advocate at <a href="https://www.agora.io/en/"
                    target="_blank">Agora</a>, Udemy <a href="https://www.udemy.com/user/dennis-ivanov-5/"
                    target="_blank">instructor</a>, <a href="https://www.youtube.com/c/dennisivy"
                    target="_blank">YouTuber</a> with 166k+ subs and contributor at <a
                    href="https://youtu.be/PtQiiknWUcI?t=6" target="_blank">Traversy Media</a>.</p>
            <p id="email">👉 dennis@dennisivy.com</p>
        </div>
    </section>

    @if (count($data['sociallinks']) > 0)
        <section class="section--page">
            <div id="socials--list">
                @foreach ($data['sociallinks'] as $link)
                    <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
                @endforeach
                <a href="./assets/resume.pdf" target="_blank">Download Resume</a>
            </div>
        </section>
    @endif

    @if (count($data['skills']) > 0)
        <section class="section--page">
            <h2>Skills & Qualifications</h2>
            <ul id="qualifications--list">
                @foreach ($data['skills'] as $skill)
                    <li>✔️ {{ $skill->skill }}</li>
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
@endsection
