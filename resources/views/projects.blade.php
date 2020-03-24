@extends('base')

@section('head')
    <link href="{{ mix("css/projects.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/animate.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1 class="info-title">Mon travail</h1>
        <h2 class="info-details">Voici quelques projets sur lesquels j'ai été amenée à travailler</h2>
    </div>
    <div class="projects-container">
        <div class="projects">
            @foreach ($projects as $project)
                <div class="project animated fadeInUp">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"/>
                    <div class="project-info">
                        <h2 class="project-title">{{ $project->title }}</h2>
                        <div class="badge-container">
                            @foreach (json_decode($project->used_techs) as $tech)
                                <span class="dr-badge">{{ $tech->name }}</span>
                            @endforeach
                        </div>
                        <p class="project-description">{{$project->description}}</p>
                        <div class="project-links">
                            <div class="info-url">
                                @if (!is_null($project->website_url) && $project->website_url !== '')
                                    <a href="{{ $project->website_url }}" target="_blank" class="link secondary-btn">Visiter</a>
                                @endif
                                @if (!is_null($project->github_url) && $project->github_url !== '')
                                    <a href="{{ $project->github_url }}" target="_blank" class="link secondary-btn">Github</a>
                                @endif
                            </div>
                            <div class="video-url">
                                {{-- @if (!is_null($project->video_url) &&$project->video_url !== '')
                                    {{ $project->video_url }}
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/qdeFd88Iq3s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/projects.js') }}"></script>
@endsection