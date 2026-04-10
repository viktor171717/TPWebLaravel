@extends('layouts.auth')

@section('title', "S'inscrire - TicketPro")

@section('content')
<main>
    <div class="login-container">
        <form class="form-signup" id="signup-form" action="{{ route('signup.store') }}" method="POST" novalidate>
            @csrf
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="login-logo">
            <h1 class="log-text">S'inscrire</h1>



            <div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nom complet" id="signup-lastname" class="login-id" required>
                @if ($errors->has('name'))
                    <div class="error-message">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail" id="signup-email" class="login-id" required>
                @if ($errors->has('email'))
                    <div class="error-message">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div>
                <input type="password" name="password" placeholder="Mot de passe" id="password" required>
                @if ($errors->has('password'))
                    <div class="error-message">{{ $errors->first('password') }}</div>
                @endif
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
