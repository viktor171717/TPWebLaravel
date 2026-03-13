@extends('layouts.app')

@section('title', 'Menu principal - TicketPro')

@section('content')
    <main class="board-main">
        <aside>
            <section class="recently-viewed">
                <h1>Vus récemment</h1>
                <div class = "recent-items">
                    <div class="word"><a href="{{ route('projects') }}#projet1">Application Web E-commerce</a></div>
                    <div class="word"><a href="{{ route('tickets') }}#ticket2">Correction des bugs CSS</a></div>
                    <div class="word"><a href="{{ route('tickets') }}#ticket3">Tests unitaires</a></div>
                    <div class="word"><a href="{{ route('tickets') }}#ticket4">Documentation API</a></div>
                </div>
            </section>
            <section class="recently-viewed", id ="collaborators">
                <h1>Mes collaborateurs</h1>
                <div class = "recent-items">
                    <div class="sideBox"><span class="word">Jean Dupont  </span> <span class = "online">en ligne</span></div>
                    <div class="sideBox"><span class="word">Marie Martin  </span> <span class = "online">en ligne</span></div>
                    <div class="sideBox"><span class="word">Sophie Lefebvre  </span> <span class = "offline">hors ligne</span></div>
                    <div class="sideBox"><span class="word">Thomas Lefevre  </span> <span class = "offline">hors ligne</span></div>
                </div>
            </section>
        </aside>
        <section class="board-content">
            <h1 id = "projects">MES PROJETS</h1>
                <div class = "project-list">
                    <div><a href="{{ route('projects') }}#projet1" class="board-project">Application Web E-commerce</a></div>
                    <div><a href="{{ route('projects') }}#projet2" class="board-project">Dashboard Analytics</a></div>
                    <div><a href="{{ route('projects') }}#projet3" class="board-project">Application Mobile iOS</a></div>
                </div>
            <h1 id = "tickets">TICKETS URGENTS</h1>
                <div class = "project-list">
                    <div><a href="{{ route('tickets') }}#ticket1" class="board-project">Correction des bugs CSS</a></div>
                    <div><a href="{{ route('tickets') }}#ticket2" class="board-project">Tests unitaires</a></div>
                </div>
        </section>

    </main>
@endsection
    <script src="script.js" src ></script>

