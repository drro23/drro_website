@extends('base')

@section('head')
    <link href="{{ mix('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1 class="title center">Vous avez un projet digital à réaliser ?</br> Je suis là pour vous aider</h1>
        <div id="carousel-projects">
            @foreach ($projects as $project)
                <div class="project">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"/>
                </div>
            @endforeach
        </div>
        <a href="/projects" class="link btn-primary">Projets</a>
    </div>
    <div class="container">
        <section id="presentation">
            <h1 class="title">Qui suis-je?</h1>
            <p class="text-presentation">Cela fait maintenant plus de 5 ans que je travaille sur pleins de projets informatiques. j'ai créé mon premier site internet au lycée lors de mon année de première. J'ai ensuite poursuivi dans la voie qui me permettrait d'en apprendre plus et c'est ainsi que j'ai intégré mon DUT Informatique et obtenu par la suite ma Licence professionnelle. Vous l'aurez compris, je suis vraiment passionné d'informatique, c'est pour cela que je suis devenu <strong>développeur web et mobile</strong>. Je suis motivé par tous les aspects de la création de produits numériques. <strong>Développement front-end<strong>, <strong>développement back-end et design UI/UX<strong>. Je suis une personne très curieuse, ce qui me permet d'être polyvalent dans mon travail. J'aime avant tout pouvoir créer un produit de qualité dont mon client sera satisfait.</br></br>
                
                Vous avez une nouvelle idée ou un projet déjà existant ? Je peux vous accompagner et vous conseiller pour que votre projet soit une réussite. N'hésitez pas à me contacter et discutons plus en détails de vos besoins.
                
            </p>
        </section>
    </div>
    <div class="container">
        <h1 class="title">Services</h1>
        <div id="services-container">
            <section id="web-apps">
                <h2 class="title-2"><strong>Applications web</strong></h2>
                <p>Développement de <strong>site vitrinne</strong>, d'applications web avec les <strong>Frameworks Django</strong> ou <strong>Laravel</strong>, interfaces graphiques avec <strong>ReactJS</strong>, <strong>création d'APIs</strong>, intégration de services en ligne, deploiment dans le cloud chez <strong>AWS</strong>.
                    Je vous aiderais à définir tous les aspects de votre projet web et à le réaliser afin que celui-ci soit adapté à vos besoins et à ceux de vos clients.</p>
                <div class="tech-used">
                    <h3 class="title-3">
                        Technologies utilisées
                    </h3>
                    <div id="carousel-web-techs" class="tech">
                        <img src="{{ asset("storage/images/usedTechs/django_logo_min.png") }}" alt="django python framework icon" title="Django" width="60px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/laravel_logo_min.png") }}" alt="laravel php framework icon" title="Laravel" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/react_logo_min.png") }}" alt="React UI javascript framework icon" title="React" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/angular_icon.svg") }}" alt="angular javascript framework icon" title="Angular" width="80px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/postgresql_min.png") }}" alt="Postgresql logo" title="PostgreSQL Database" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/mysql_logo_min.png") }}" alt="Mysql logo" title="Mysql database" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/mongodb-logo_min.png") }}" alt="MongoDB logo" title="MongoDB NoSQL Database" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/wordpress_logo_min.png") }}" alt="Wordpress CMS icon" title="Wordpress Content Management System" width="45px" height="45px">
                    </div>
                </div>
            </section>
            <section id="mobile-apps">
                <h2 class="title-2"><strong>Applications mobile</strong></h2>
                <p>Je vous accompagne dans la conception et la réalisation d'applications natives iOS/Android ou bien hybrides avec le <strong>framework Flutter</strong> ce qui vous permetra de minimiser les coûts tout en offrant à vos clients une excellante expérience utilisateur.
                </p>
                <div class="tech-used">
                    <h3 class="title-3">
                        Technologies utilisées
                    </h3>
                    <div id="carousel-mobile-techs" class="tech">
                        <img src="{{ asset("storage/images/usedTechs/flutter_min.png") }}" alt="flutter logo" title="Flutter" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/android_logo.svg") }}" alt="android logo" title="Android" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/swift_logo_min.png") }}" alt="swift logo" title="Swift" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/firebase_logo_min.png") }}" alt="firebase google database logo" title="Firebase database" width="45px" height="45px">
                        <img src="{{ asset("storage/images/usedTechs/unity_logo_min.png") }}" alt="unity logo" title="Unity" width="45px" height="45px">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container">
        <h1 class="title">Compétences</h1>
        <div id="skills">
            <div id="skills-presentation">
                <p>Je développe en utilisant des technologies reconnues pour leur fiabilité et maintenance à long terme afin d'assurer une qualité logicielle optimale répondant aux normes en vigueur.</p>
            </div>
            <div id="skill-techs">
                <img src="{{ asset("storage/images/usedTechs/django_logo.png") }}" alt="django icon" title="Django" width="60px" height="45px">
                <img src="{{ asset("storage/images/usedTechs/android_logo.svg") }}" alt="android icon" title="Android" width="45px" height="45px">
                <img src="{{ asset("storage/images/usedTechs/react_logo.png") }}" alt="react icon" title="React JS framework" width="45px" height="45px">
                <img src="{{ asset("storage/images/usedTechs/python_logo_min.png") }}" alt="angular logo" title="Angular framework front-end" width="45px" height="45px">    
                <img src="{{ asset("storage/images/usedTechs/flutter.png") }}" alt="flutter logo" title="Flutter framework mobile hybride" width="45px" height="45px">
                <img src="{{ asset("storage/images/usedTechs/laravel_logo.png") }}" alt="laravel icon" title="Laravel PHP framework" width="45px" height="45px">
            </div>
        </div>
        <a href="/contact" class="link btn-primary">Contact</a>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/carousel.js') }}"></script>
@endsection