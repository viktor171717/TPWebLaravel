@extends('layouts.auth')

@section('title', 'S'inscrire - TicketPro')

@section('content')
<main>
    <div class="login-container">
        <form class="form-signup" id="signup-form">
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="login-logo">
            <h1 class="log-text">S'inscrire</h1>

            <div>
                <input type="text" placeholder="Nom" id="signup-lastname" class="login-id">
                <div class="error-message" id="lastname-error"></div>
            </div>

            <div>
                <input type="text" placeholder="Prénom" id="signup-firstname" class="login-id">
                <div class="error-message" id="firstname-error"></div>
            </div>

            <div>
                <input  placeholder="E-Mail" id="signup-email" class="login-id">
                <div class="error-message" id="email-error"></div>
            </div>

            <div>
                <input type="password" placeholder="Mot de passe" id="password">
                <div class="error-message" id="password-error"></div>
            </div>

            <div class="div-other">
                <div><a href="{{ route('login') }}" class="other">Se connecter</a></div>
            </div>

            <div id="div-login-button">
                <button type="submit" id="login-button">S'inscrire</button>
            </div>
        </form>
    </div>
</main>
@endsection
@push('scripts')
    <script>
        const APP_URLS = {
            board: "{{ route('dashboard') }}",
        };
    </script>
    <script src="{{ asset('js/signup.js') }}"></script>
@endpush
