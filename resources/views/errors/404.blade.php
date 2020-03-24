<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>404 - Page non disponible</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}"  />
    <link rel="stylesheet" href="{{ mix('css/404.css') }}"  />
</head>
<body class="m-0">
    <div class="mw-100 mh-100">
        <img src="{{ asset('images/undraw_404.svg') }}" class="lost-404" alt="une personne perdue dans l'univers internet">
        <h1 class="text-black text-404">Ooops - 404</h1>
        <p class="text-info-404">Vous avez perdu votre chemin, mais c'est pas grave vous pouvez retourner à l'accueil en cliquant sur le boutton juste en dessous <img src="{{ asset('images/smile_emoji.svg') }}" width="30px" height="30px" alt="emoji qui sourit" /></p>
        <a href="/" class="btn-primary text-white">Accueil</a>
    </div>
</body>
</html>