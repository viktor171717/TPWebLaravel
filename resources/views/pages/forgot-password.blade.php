@extends('layouts.auth')

@section('title', 'Mot de passe oublié - TicketPro')

@section('content')
<main>
    <div class="login-container">
        <form class="">
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="login-logo">
            <h1 class="log-text">Réinitialiser mot de passe</h1>

            <div>
                <input placeholder="E-Mail" id="login-id">
                <div class="error-message" id="email-error"></div>
            </div>

            <div>
                <input placeholder="Confirmation E-Mail" id="login-id2">
                <div class="error-message" id="email-error2"></div>
            </div>

            <div class="div-other">
                <div><a href="{{ route('login') }}" class="other">Se connecter</a></div>
                <div><a href="{{ route('signup') }}" class="other">S'inscrire</a></div>
            </div>

            <div id="div-login-button">
                <button type="submit" id="login-button">Réinitialiser</button>
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
    <script src="{{ asset('js/forgot-password.js') }}"></script>
@endpush
