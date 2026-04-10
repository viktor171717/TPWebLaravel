@extends('layouts.app')

@section('title', 'Mes Tickets - TicketPro')

@section('content')
<main class="tickets-main">
    <h1>Mes Tickets</h1>

    @if (session('success'))
        <div class="validation-div ticket-success">{{ session('success') }}</div>
    @endif

    <div class="div-new-ticket-button">
        <button type="button" id="open-ticket-modal">+ Nouveau ticket</button>
    </div>

    <dialog id="new-ticket-modal" class="ticket-dialog">
        <div class="inpage-new-ticket ticket-modal-wrapper">

        <div class="new-first-div">
            <h1>Ajouter un ticket</h1>
            <button type="button" id="close-ticket-modal" class="ticket-close-btn" aria-label="Fermer">X</button>

            @if ($errors->any())
                <div class="validation-div ticket-fail">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST" id="new-ticket-form">
                @csrf
                <div class="new-ticket-div">
                    <input
                        type="text"
                        name="title"
                        placeholder="Titre du ticket"
                        class="title-input"
                        value="{{ old('title') }}"
                        required
                    >
                </div>

                <div class="new-ticket-div">
                    <textarea rows="4" name="description" placeholder="Description du ticket">{{ old('description') }}</textarea>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-priority" class="new-ticket-label">Priorite:</label>
                    <select id="ticket-priority" name="priority" required>
                        <option value="basse" @selected(old('priority') === 'basse')>Basse</option>
                        <option value="normale" @selected(old('priority', 'normale') === 'normale')>Normale</option>
                        <option value="haute" @selected(old('priority') === 'haute')>Haute</option>
                        <option value="urgente" @selected(old('priority') === 'urgente')>Urgente</option>
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-type" class="new-ticket-label">Type:</label>
                    <select id="ticket-type" name="type" required>
                        <option value="included" @selected(old('type', 'included') === 'included')>Inclus</option>
                        <option value="billable" @selected(old('type') === 'billable')>Facturable</option>
                    </select>
                </div>

                <div class="new-ticket-div">
                    <label for="ticket-project" class="new-ticket-label">Projet:</label>
                    <select id="ticket-project" name="project_id" required>
                        <option value="">Selectionner un projet</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @selected((int) old('project_id') === $project->id )>
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
                            <option value="{{ $user->id }}" @selected((int) old('user_id') === $user->id)>
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
                        value="{{ old('estimated_time') }}"
                    >
                </div>

                <div class="div-button-ticket">
                    <button type="submit" class="new-ticket-button">Creer le ticket</button>
                </div>
            </form>
        </div>
</div>
    </dialog>

    <table class="tickets-table">
        <thead>
            <tr>
                <th class="ticket-title">Titre</th>
                <th>Description</th>
                <th>
                    Statut
                    <div class="dropdown-filter">
                        <button type="button" class="dropdown-btn">▼</button>
                        <div class="dropdown-content" id="status-dropdown">
                            <label><input type="checkbox" checked class="status-filter" value="Nouveau"> Nouveau</label>
                            <label><input type="checkbox" checked class="status-filter" value="En cours"> En cours</label>
                            <label><input type="checkbox" checked class="status-filter" value="En attente client"> En attente client</label>
                            <label><input type="checkbox" checked class="status-filter" value="Termine"> Termine</label>
                            <label><input type="checkbox" checked class="status-filter" value="A valider"> A valider</label>
                            <label><input type="checkbox" checked class="status-filter" value="Valide"> Valide</label>
                            <label><input type="checkbox" checked class="status-filter" value="Refuse"> Refuse</label>
                        </div>
                    </div>
                </th>
                <th>
                    Priorite
                    <div class="dropdown-filter">
                        <button type="button" class="dropdown-btn">▼</button>
                        <div class="dropdown-content" id="priority-dropdown">
                            <label><input type="checkbox" checked class="priority-filter" value="Basse"> Basse</label>
                            <label><input type="checkbox" checked class="priority-filter" value="Normale"> Normale</label>
                            <label><input type="checkbox" checked class="priority-filter" value="Haute"> Haute</label>
                            <label><input type="checkbox" checked class="priority-filter" value="Urgente"> Urgente</label>
                        </div>
                    </div>
                </th>
                <th>
                    Type
                    <div class="dropdown-filter">
                        <button type="button" class="dropdown-btn">▼</button>
                        <div class="dropdown-content" id="type-dropdown">
                            <label><input type="checkbox" checked class="type-filter" value="billable"> Facturable</label>
                            <label><input type="checkbox" checked class="type-filter" value="included"> Inclus</label>
                        </div>
                    </div>
                </th>
                <th>Temps estime</th>
                <th>Temps reel</th>
                <th>Collaborateur</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr class="clickable-row ticket-rows" data-url="{{ route('tickets.show', $ticket) }}">
                    <td class="ticket-title">{{ $ticket->title }}</td>
                    <td class="ticket-description">
                        {{ $ticket->description ?: '-' }}
                        @if ($ticket->project)
                            <br>
                            <small class="ticket-project-id">Projet: {{ $ticket->project->name }}</small>
                        @endif
                    </td>
                    <td class="ticket-status">{{ $ticket->status }}</td>
                    <td class="ticket-priority">{{ $ticket->priority }}</td>
                    <td class="ticket-type">{{ $ticket->type }}</td>
                    <td class="ticket-estimated-time">{{ $ticket->estimated_time !== null ? number_format($ticket->estimated_time / 60, 1) . 'h' : '-' }}</td>
                    <td class="ticket-real-time">{{ number_format($ticket->real_time / 60, 1) }}h</td>
                    <td class="ticket-user-id">{{ $ticket->assignedUser?->name ?? 'Non assigne' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Aucun ticket en base de donnees.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('js/tickets.js') }}"></script>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('new-ticket-modal')?.showModal();
            });
        </script>
    @endif
@endpush
