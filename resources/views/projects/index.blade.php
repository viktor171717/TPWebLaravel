@extends('layouts.app')

@section('title', 'Projets - TicketPro')

@section('content')
<main>
    <h1 id="projects-title">Mes Projets</h1>

    @if (session('success'))
        <div class="validation-div ticket-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="validation-div ticket-fail">
            {{ $errors->first() }}
        </div>
    @endif

    @forelse ($projects as $project)
        <section id="project-{{ $project->id }}">
            <h2 class="project-name">{{ $project->name }}</h2>

            <table class="project-table">
                <thead>
                    <tr class="project-head">
                        <th>Collaborateurs</th>
                        <th>Tickets</th>
                        <th>Contrat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="project-row">
                        <td class="project-list-start">
                            <ul>
                                <li>Responsable: {{ $project->user?->name ?? 'N/A' }}</li>
                                @forelse ($project->users as $member)
                                    <li>{{ $member->name }}</li>
                                @empty
                                    <li>Aucun collaborateur affecte.</li>
                                @endforelse
                            </ul>
                        </td>
                        <td class="project-list-middle">
                            <ul>
                                @forelse ($project->tickets as $ticket)
                                    <li>
                                        <a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->title }}</a>
                                        ({{ $ticket->status_label }})
                                    </li>
                                @empty
                                    <li>Aucun ticket sur ce projet.</li>
                                @endforelse
                            </ul>
                        </td>
                        <td class="project-list-end">
                            <ul>
                                @if ($project->contract)
                                    <li>Heures incluses: {{ $project->contract->hours_included }}h</li>
                                    <li>
                                        Periode:
                                        {{ $project->contract->starts_at ?? '-' }}
                                        -
                                        {{ $project->contract->ends_at ?? '-' }}
                                    </li>
                                    <li>Taux horaire supplementaire: {{ $project->contract->hourly_rate }} EUR/h</li>
                                @else
                                    <li>Aucun contrat pour ce projet.</li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                    <tr class="project-button">
                        <td>-</td>
                        <td>
                            <a href="{{ route('tickets.create', ['project_id' => $project->id]) }}" class="button-add-ticket">
                                Ajouter un ticket
                            </a>
                        </td>
                        <td>
                            <a href="#contract-form-{{ $project->id }}" class="button-change-contract">
                                {{ $project->contract ? 'Modifier contrat' : 'Ajouter contrat' }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="new-ticket" id="contract-form-{{ $project->id }}">
                <div class="new-first-div">
                    <h1>{{ $project->contract ? 'Modifier le contrat' : 'Ajouter un contrat' }}</h1>
                    <a href="#!">X</a>

                    <form action="{{ $project->contract ? route('contracts.update', $project->contract) : route('contracts.store', $project) }}" method="POST">
                        @csrf
                        @if ($project->contract)
                            @method('PUT')
                        @endif

                        <div class="new-ticket-div">
                            <label for="hours_included_{{ $project->id }}">Heures incluses</label>
                            <input
                                id="hours_included_{{ $project->id }}"
                                name="hours_included"
                                type="number"
                                min="1"
                                value="{{ old('hours_included', $project->contract?->hours_included ?? 50) }}"
                                required
                            >
                        </div>

                        <div class="new-ticket-div">
                            <label for="hourly_rate_{{ $project->id }}">Taux horaire supplementaire</label>
                            <input
                                id="hourly_rate_{{ $project->id }}"
                                name="hourly_rate"
                                type="number"
                                min="0"
                                step="0.01"
                                value="{{ old('hourly_rate', $project->contract?->hourly_rate ?? 0) }}"
                            >
                        </div>

                        <div class="new-ticket-div">
                            <label for="starts_at_{{ $project->id }}">Date de debut</label>
                            <input
                                id="starts_at_{{ $project->id }}"
                                name="starts_at"
                                type="date"
                                value="{{ old('starts_at', $project->contract?->starts_at) }}"
                            >
                        </div>

                        <div class="new-ticket-div">
                            <label for="ends_at_{{ $project->id }}">Date de fin</label>
                            <input
                                id="ends_at_{{ $project->id }}"
                                name="ends_at"
                                type="date"
                                value="{{ old('ends_at', $project->contract?->ends_at) }}"
                            >
                        </div>

                        <div class="div-button-ticket">
                            <button type="submit">{{ $project->contract ? 'Modifier le contrat' : 'Creer le contrat' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @empty
        <section>
            <p>Aucun projet en base de donnees pour le moment.</p>
        </section>
    @endforelse

    <div class="new-ticket" id="new-project">
        <div class="new-first-div">
            <form action="{{ route('projects.store') }}" method="POST" class="form-project">
                @csrf
                <h1>Ajouter un projet</h1>
                <a href="#!">X</a>

                <div class="new-ticket-div">
                    <input
                        type="text"
                        name="name"
                        placeholder="Titre du projet"
                        class="title-input"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="new-ticket-div">
                    <textarea rows="4" name="description" placeholder="Description du projet">{{ old('description') }}</textarea>
                </div>

                <div class="new-ticket-div">
                    <label for="project-owner">Responsable</label>
                    <select id="project-owner" name="user_id" required>
                        <option value="">Selectionner un responsable</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <label>Collaborateurs</label>
                <div class="collab-div">
                    @foreach ($users as $user)
                        <label class="collab-label">
                            {{ $user->name }}
                            <input
                                type="checkbox"
                                name="users[]"
                                value="{{ $user->id }}"
                                @checked(collect(old('users', []))->contains($user->id))
                            >
                        </label>
                    @endforeach
                </div>

                <div class="div-button-ticket">
                    <button type="submit">Creer le projet</button>
                </div>
            </form>
        </div>
    </div>

    <div class="div-new-ticket-button project">
        <a href="#new-project">+ Nouveau projet</a>
    </div>
</main>
@endsection
