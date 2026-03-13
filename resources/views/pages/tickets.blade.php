@extends('layouts.app')

@section('title', 'Mes Tickets - TicketPro')

@section('content')
    <main class="tickets-main">
        <h1>Mes Tickets</h1>
    <table class="tickets-table">
        <thead>
            <tr>
                <th class="ticket-title">Titre</th>
                <th>Description</th>
                <th>
                Statut
                <div class="dropdown-filter">
                    <button class="dropdown-btn">▼</button>
                    <div class="dropdown-content" id="status-dropdown">
                    <label><input type="checkbox" checked class="status-filter" value="À faire"> À faire</label>
                    <label><input type="checkbox" checked class="status-filter" value="En cours"> En cours</label>
                    <label><input type="checkbox" checked class="status-filter" value="Terminé"> Terminé</label>
                    </div>
                </div>
                </th>

                <!-- PRIORITÉ -->
                <th>
                Priorité
                <div class="dropdown-filter">
                    <button class="dropdown-btn">▼</button>
                    <div class="dropdown-content" id="priority-dropdown">
                    <label><input type="checkbox" checked class="priority-filter" value="Haute"> Haute</label>
                    <label><input type="checkbox" checked class="priority-filter" value="Basse"> Basse</label>
                    </div>
                </div>
                </th>

                <!-- TYPE -->
                <th>
                Type
                <div class="dropdown-filter">
                    <button class="dropdown-btn">▼</button>
                    <div class="dropdown-content" id="type-dropdown">
                    <label><input type="checkbox" checked class="type-filter" value="Facturable"> Facturable</label>
                    <label><input type="checkbox" checked class="type-filter" value="Inclus"> Inclus</label>
                    </div>
                </div>
                </th>
                <th>Temps estimé</th>
                <th>Temps réel</th>
                <th>Collaborateurs</th>
            </tr>
        </thead>
        <tbody>
            <tr id="ticket1"class="clickable-row" >
                <td>Implémentation de la page d'accueil</td>
                <td>Créer la page d'accueil avec navigation principale</td>
                <td>En cours</td>
                <td>Haute</td>
                <td>Facturable</td>
                <td>4h</td>
                <td>3h 30m</td>
                <td>Jean Dupont, Marie Martin</td>
            </tr>
            <tr id="ticket2"class="clickable-row" >
                <td>Correction des bugs CSS</td>
                <td>Corriger les problèmes d'affichage sur mobile et desktop</td>
                <td>À faire</td>
                <td>Haute</td>
                <td>Inclus</td>
                <td>2h</td>
                <td>1h 15m</td>
                <td>Pierre Bernard</td>
            </tr>
            <tr id="ticket3"class="clickable-row" >
                <td>Tests unitaires</td>
                <td>Ajouter les tests unitaires pour les modules principaux</td>
                <td>Terminé</td>
                <td>Basse</td>
                <td>Facturable</td>
                <td>6h</td>
                <td>6h 45m</td>
                <td>Sophie Lefebvre, Thomas Lefevre</td>
            </tr>
            <tr id="ticket4" class="clickable-row" >
                <td>Documentation API</td>
                <td>Rédiger la documentation complète de l'API REST</td>
                <td>En cours</td>
                <td>Haute</td>
                <td>Inclus</td>
                <td></td>
                <td>2h</td>
                <td>Luc Moreau</td>
            </tr>
            <tr id="ticket5" class="clickable-row" >
                <td>Préparation JS</td>
                <td>Faire le JS de la page</td>
                <td>À faire</td>
                <td>Basse</td>
                <td>Inclus</td>
                <td>3h</td>
                <td>2h</td>
                <td>Jean Dupont</td>
            </tr>
        </tbody>
    </table>

</main>
@endsection
@push('scripts')
    <script>
        const APP_URLS = {
            board: "{{ route('dashboard') }}",
            ticketdetail: "{{ route('tickets.detail')}}"
        };
    </script>
    <script src="{{ asset('js/tickets.js') }}"></script>
@endpush
