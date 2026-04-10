@extends('layouts.app')

@section('title', 'Modifier ticket - TicketPro')

@section('content')
<main>
    <div class="inpage-new-ticket new-ticket">
        <div class="new-first-div">
            <h1>Modifier le ticket</h1>

            @if ($errors->any())
                <div class="validation-div ticket-fail">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="new-ticket-div">
                    <input
                        type="text"
                        name="title"
                        placeholder="Titre du ticket"
                        class="title-input"
                        value="{{ old('title', $ticket->title) }}"
                        required
                    >
                </div>

                <div class="new-ticket-div">
                    <textarea rows="4" name="description" placeholder="Description du ticket">{{ old('description', $ticket->description) }}</textarea>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-status" class="new-ticket-label">Statut:</label>
                    <select id="ticket-status" name="status" required>
                        <option value="nouveau" @selected(old('status', $ticket->status) === 'nouveau')>Nouveau</option>
                        <option value="en_cours" @selected(old('status', $ticket->status) === 'en_cours')>En cours</option>
                        <option value="en_attente" @selected(old('status', $ticket->status) === 'en_attente')>En attente client</option>
                        <option value="termine" @selected(old('status', $ticket->status) === 'termine')>Termine</option>
                        <option value="a_valider" @selected(old('status', $ticket->status) === 'a_valider')>A valider</option>
                        <option value="valide" @selected(old('status', $ticket->status) === 'valide')>Valide</option>
                        <option value="refuse" @selected(old('status', $ticket->status) === 'refuse')>Refuse</option>
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-priority" class="new-ticket-label">Priorite:</label>
                    <select id="ticket-priority" name="priority" required>
                        <option value="basse" @selected(old('priority', $ticket->priority) === 'basse')>Basse</option>
                        <option value="normale" @selected(old('priority', $ticket->priority) === 'normale')>Normale</option>
                        <option value="haute" @selected(old('priority', $ticket->priority) === 'haute')>Haute</option>
                        <option value="urgente" @selected(old('priority', $ticket->priority) === 'urgente')>Urgente</option>
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-type" class="new-ticket-label">Type:</label>
                    <select id="ticket-type" name="type" required>
                        <option value="included" @selected(old('type', $ticket->type) === 'included')>Inclus</option>
                        <option value="billable" @selected(old('type', $ticket->type) === 'billable')>Facturable</option>
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-project" class="new-ticket-label">Projet:</label>
                    <select id="ticket-project" name="project_id" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @selected((int) old('project_id', $ticket->project_id) === $project->id)>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-user" class="new-ticket-label">Collaborateur:</label>
                    <select id="ticket-user" name="user_id">
                        <option value="">Non assigne</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected((int) old('user_id', $ticket->user_id) === $user->id)>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="estimated_time" class="new-ticket-label">Temps estime (minutes):</label>
                    <input
                        id="estimated_time"
                        type="number"
                        name="estimated_time"
                        min="0"
                        value="{{ old('estimated_time', $ticket->estimated_time) }}"
                    >
                </div>

                <div class="new-ticket-div">
                    <label for="real_time" class="new-ticket-label">Temps passe (minutes):</label>
                    <input
                        id="real_time"
                        type="number"
                        name="real_time"
                        min="0"
                        value="{{ old('real_time', $ticket->real_time) }}"
                    >
                </div>

                <div class="div-button-ticket">
                    <button type="submit" class="new-ticket-button">Enregistrer</button>
                </div>
                <div class="div-button-ticket">
                    <a href="{{ route('tickets.show', $ticket) }}" class="button-add-ticket">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
