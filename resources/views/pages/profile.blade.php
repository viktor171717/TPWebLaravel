@extends('layouts.app')

@section('title', 'Profil - TicketPro')

@section('content')
    <main>
        <div class ="profile">
            <div class = profile-header>
                <img src="{{ asset('images/profile.png') }}" alt="Profil">
                <p>Jean Dupont</p>
            </div>
            <div class="profile-container">
                <div class ="profile-info">
                    <h2>Informations du profil</h2>
                    <p>Nom d'utilisateur : utilisateur123</p>
                    <p>E-Mail : utilisateur123@example.com</p>
                    <p>Rôle : utilisateur</p>
                </div>
                <div class="profile-cards">
                    <div class="profile-projects">
                        <h2>Projets assignés</h2>
                        <p>Projet A, Projet B</p>
                    </div>
                    <div class="profile-tickets">
                        <h2>Tickets créés</h2>
                        <p>Ticket 1, Ticket 2</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

