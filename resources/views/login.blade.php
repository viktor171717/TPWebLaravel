@extends('layouts.auth')

@section('title', 'Connection - TicketPro')

@section('content')
<main>
    <div class="login-container">
        <form action="{{ route('login.attempt') }}" method="POST" novalidate>
            @csrf
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="login-logo">
            <h1 class="log-text">Se connecter</h1>
            @if ($errors->any())
                <div class="error-message">{{ $errors->first() }}</div>
            @endif

            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail" id="login-id" required>

                <div class="error-message" id="email-error"></div>

            </div>

            <div>
                <input type="password" name="password" placeholder="Mot de passe" id="password" required>
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
