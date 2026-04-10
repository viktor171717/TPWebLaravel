@extends('layouts.app')

@section('title', 'Profil - TicketPro')

@section('content')
    <main>
        <div class ="profile">
            <div class = profile-header>
                <img src="{{ asset('images/profile.png') }}" alt="Profil">
                <p>{{ $name }}</p>
            </div>
            <div class="profile-container">
                <div class ="profile-info">
                    <h2>Informations du profil</h2>
                    <p>Nom d'utilisateur : {{ $name }}</p>
                    <p>E-Mail : {{ $email }}</p>
                </div>
                <div class="profile-cards">
                    <div class="profile-projects">
                        <h2>Projets assignés</h2>
                        <p>{{ $projects->pluck('name')->implode(', ') }}</p>
                    </div>
                    <div class="profile-tickets">
                        <h2>Tickets créés</h2>
                        <p>{{ $tickets->pluck('title')->implode(', ') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

