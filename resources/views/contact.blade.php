@extends('base')

@section('head')
    <link href="{{ mix("css/contact.css") }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
    <div class="container">
        <h1 class="title">Me contacter</h1>
        <h2 class="contact-info">Discutons plus en détail de votre projet. N'hésitez pas à être le plus précis possible afin de pouvoir estimer au mieux le coût de celui-ci</h2>
        @if (Session::has('flash_message'))
            <p class="success">{{ Session::get('flash_message') }}</p>
        @endif
        @if (Session::has('flash_message_error'))
            <p class="error-message">{{ Session::get('flash_message_error') }}</p>
        @endif
        <form class="card" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <label for="name" class="space"></label>
            <input class="center" id="nameField" type="text" name="name" placeholder="Nom">
            @if ($errors->has('name'))
                <small class="error">Veuillez entrer votre nom !</small>
            @else
                <small class="error none">Erreur</small>
            @endif
            <input id="emailField" type="email" name="email" placeholder="exemple@email.com">
            @if ($errors->has('email'))
                <small class="error">Veuillez renseigner un e-mail valide !</small>
            @else
                <small class="error none">Erreur</small>
            @endif
            <textarea id="messageField" name="message" id="message" cols="30" rows="10" placeholder="Description du projet"></textarea><br>
            @if ($errors->has('message'))
                <small class="error">Veuillez décrire votre projet !</small>
            @else
                <small class="error none">Erreur</small>
            @endif
            @if( env('GOOGLE_RECAPTCHA_KEY') )
            <div>
                <div class="text-center">
                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                </div>
            </div>
            @else
                <p class="text-center">Error captcha</p>
            @endif
            <button class="btn-primary">Envoyer</button>
        </form>
    </div>
@endsection