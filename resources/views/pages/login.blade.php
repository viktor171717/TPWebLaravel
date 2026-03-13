@extends('layouts.auth')

@section('title', 'Connection - TicketPro')

@section('content')
<main>
    <div class="login-container">
        <form class="">
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="login-logo">
            <h1 class="log-text">Se connecter</h1>

            <div>
                <input placeholder="E-Mail" id="login-id">
                <div class="error-message" id="email-error"></div>
            </div>

            <div>
                <input type="password" placeholder="Mot de passe" id="password">
                <div class="error-message" id="password-error"></div>
            </div>

            <div class="div-other">
                <div><a href="{{ route('forgot-password') }}" class="other">Mot de passe oublié</a></div>
                <div><a href="{{ route('signup') }}" class="other">S'inscrire</a></div>
            </div>

            <div id="div-login-button">
                <button type="submit" id="login-button">Se connecter</button>
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
    <script src="{{ asset('js/login.js') }}"></script>
@endpush

