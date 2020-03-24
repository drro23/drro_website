<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158085025-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-158085025-1');
    </script>

    <meta charset="utf-8">
    <meta name="description" content="Développeur Django - Python - Flutter - Laravel - ReactJS, création d'application web et mobile, création de site vitrine, création d'API, déploiement dans le cloud.." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DRRO - Développeur web et mobile freelance</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet" >
    @yield('head')
</head>

<body>
    <header id="particles-js">
        <div id="wrap-content">
            <div id="top-bar">
                <a id="logo" href="/"><h1>DR</br>RO</h1></a>
                <div id="nav-bar">
                    <nav id="menu">
                        <ul>
                            <li><a href="/" class="linkMenu">Accueil</a></li>
                            <li><a href="/projects" class="linkMenu">Projets</a></li>
                            <!-- <li><a href="/apropos">A propos</a></li> -->
                            <!-- <li><a href="/blog">Blog</a></li> -->
                            <li><a href="/contact" class="linkMenu">Contact</a></li>
                        </ul>
                    </nav>
                    <div id="multilang">
                        <img src="{{ asset("storage/images/france_min.png") }}" alt="drapeau français" width="30px" height="30px">
                        <img src="{{ asset("storage/images/british_min.png") }}" alt="drapeau anglais" width="30px" height="30px">
                    </div>
                </div>
                <span id="menuIcon">
                    <i class="fa fa-bars fa-lg"></i>
                </span>
            </div>
            <div id="centered-content">
                <img src="{{ asset("storage/images/portrait_robert_min.png") }}" alt="portrait" width="164px" height="165px">
                <div id="social-pro">
                    <a href="https://www.linkedin.com/in/dragan-robert" target="_blank"><img src="{{ asset("storage/images/linkedin_min.png") }}" alt="réseau social pour professionnels LinkedIn" width="36px" height="36px"></a>
                    <a href="https://github.com/drro23" target="_blank"><img src="{{ asset("storage/images/github_min.png") }}" alt="github platforme de versionning" width="36px" height="36px"></a>
                </div>
                <h1 id="type-writer">
                    <span class="txt-type" data-wait="3000" data-words='["Dragan Robert", "Développeur Full Stack", "Django - Flutter - ReactJS", "Développeur passionné"]'></span>
                </h1>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <p>Fait avec <img src="{{ asset("storage/images/heart.svg") }}" width="13px" height="13px" alt="coeur"/> par Dragan Robert</p><br/>
        <p>&copy; {{ now()->year }} <strong class="drro">DRRO</strong> - Dragan Robert. Tous droits réservés.</p>
    </footer>
    <script src="{{ mix("js/welcomeMenu.js") }}"></script>
    <script src="{{ mix("js/type-writer.js") }}"></script>
    @yield('js')
</body>
</html>