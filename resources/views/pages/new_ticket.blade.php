@extends('layouts.app')

@section('title', 'Nouveau ticket - TicketPro')

@section('content')

    <main>
        <form action="">
        <div class="inpage-new-ticket new-ticket">
        <div class="new-first-div" >
            <h1>Ajouter un ticket</h1>

            <div class = "new-ticket-div"><input type="text" placeholder = "Titre du ticket :" class = "title-input"></div>
                <div  class="hidden validation-ticket-1">Veuillez entrer un Nom et un Prénom valide</div>

            <div class = "new-ticket-div"><textarea rows="4"  placeholder="Description du ticket"></textarea></div>
                <div  class="hidden validation-ticket-2">Veuillez entrer un Nom et un Prénom valide</div>


            <div class = "new-ticket-div">
                <label for="ticket-priority" class="new-ticket-label">Priorité :</label>
                <select id="ticket-priority"  >
                    <option value="low">Basse</option>
                    <option value="medium">Moyenne</option>
                    <option value="high">Haute</option>
                </select>
            </div>

            <div class = "new-ticket-div">
                <label for="ticket-project" class="new-ticket-label">Projet :</label>
                <select id="ticket-project"  >
                    <option value="1">Application Web E-commerce</option>
                    <option value="2">Dashboard Analytics</option>
                    <option value="3">Application Mobile iOS</option>
                </select>
            </div>





            <div class="div-button-ticket"><button type = "submit">Créer le ticket</button></div>
        </div>
        </div>

        <div class="validation-div hidden ticket-return">Ticket créé avec succès !</div>
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('js/new_ticket.js') }}"></script>
@endpush
