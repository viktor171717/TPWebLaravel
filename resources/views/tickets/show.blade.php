@extends('layouts.app')

@section('title', 'Detail du ticket - TicketPro')

@section('content')
<main class="ticket-detail-main">
    <div class="ticket-detail-container">
        <div class="ticket-header">
            <div class="ticket-title-section">
                <h1 id="ticket-title">{{ $ticket->title }}</h1>
                <p class="ticket-id">Ticket #{{ str_pad((string) $ticket->id, 3, '0', STR_PAD_LEFT) }}</p>
            </div>
            <div class="ticket-actions">
                <a href="{{ route('tickets.edit', $ticket) }}" class="button-add-ticket new-ticket-button button-show">Modifier</a>
                <form class="form-nul" action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>

        <div class="ticket-content">
            <div class="ticket-left">
                <div class="detail-section">
                    <h2>Description</h2>
                    <p class="description-text">{{ $ticket->description ?: 'Aucune description.' }}</p>
                </div>

                <div class="detail-section">
                    <h2>Projet associe</h2>
                    <div class="project-badge">
                        <a href="{{ route('projects.index') }}#project-{{ $ticket->project?->id }}">
                            {{ $ticket->project?->name ?? 'Projet non trouve' }}
                        </a>
                    </div>
                </div>

                <div class="detail-section">
                    <h2>Historique</h2>
                    <div class="comments-container">
                        <div class="comment">
                            <div class="comment-header">
                                <strong>Creation</strong>
                                <span class="comment-date">{{ $ticket->created_at?->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="comment-text">Le ticket a ete cree.</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <strong>Derniere mise a jour</strong>
                                <span class="comment-date">{{ $ticket->updated_at?->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="comment-text">Dernier etat enregistre dans la base.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ticket-right">
                <div class="left-infos">
                    <div class="info-card-1">
                        <div class="info-row">
                            <label>Etat</label>
                            <span>{{ $ticket->status_label }}</span>
                        </div>
                    </div>

                    <div class="info-card-1">
                        <div class="info-row">
                            <label>Priorite</label>
                            <span>{{ $ticket->priority_label }}</span>
                        </div>
                    </div>

                    <div class="info-card-1">
                        <div class="info-row">
                            <label>Type de travail</label>
                            <span>{{ $ticket->type_label }}</span>
                        </div>
                    </div>
                </div>

                <div class="info-card-time">
                    <div class="info-row">
                        <label>Temps estime:</label>
                        <label class="original-time">{{ $ticket->estimated_time !== null ? number_format($ticket->estimated_time / 60, 1) : '-' }}</label>
                        <label>heures</label>
                    </div>
                    <div class="info-row">
                        <label>Temps reel</label>
                        <span class="value">{{ number_format($ticket->real_time / 60, 1) }} heures</span>
                    </div>
                </div>

                <div class="info-card">
                    <h3>Collaborateur assigne</h3>
                    <div class="assignees">
                        <div class="assignee">
                            <span>{{ $ticket->assignedUser?->name ?? 'Non assigne' }}</span>
                        </div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-row">
                        <label>Cree le</label>
                        <span class="value">{{ $ticket->created_at?->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="info-row">
                        <label>Derniere modification</label>
                        <span class="value">{{ $ticket->updated_at?->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-button-ticket">
        <a href="{{ route('tickets.index') }}" class="button-add-ticket new-ticket-button button-show">Retour aux tickets</a>
    </div>
</main>
@endsection
