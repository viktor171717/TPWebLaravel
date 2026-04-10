@extends('layouts.app')

@section('title', 'Nouveau ticket - TicketPro')

@section('content')
<main>
    <div class="inpage-new-ticket new-ticket">
        <div class="new-first-div">
            <h1>Ajouter un ticket</h1>

            @if ($errors->any())
                <div class="validation-div ticket-fail">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST">
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
                            <option
                                value="{{ $project->id }}"
                                @selected((int) old('project_id', request('project_id')) === $project->id)
                            >
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
                    <button class="new-ticket-button" type="submit">Creer le ticket</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
