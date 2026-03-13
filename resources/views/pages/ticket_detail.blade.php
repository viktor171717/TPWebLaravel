@extends('layouts.app')

@section('title', 'Detail du ticket - TicketPro')

@section('content')
    <main class="ticket-detail-main">
        <form class="ticket-detail">
        <div class="ticket-detail-container">
            <div class="ticket-header">
                <div class="ticket-title-section">
                    <h1 id="ticket-title">Implémentation de la page d'accueil</h1>
                    <p class="ticket-id">Ticket #001</p>
                </div>
                <div class="ticket-actions">
                    <button  class="btn btn-danger">Supprimer</button>
                </div>
            </div>
            <!-- Main Content Grid -->
            <div class="ticket-content">
                <!-- Left Column -->
                <div class="ticket-left">
                    <!-- Description Section -->
                    <div class="detail-section">
                        <h2>Description</h2>
                        <p class="description-text">Créer la page d'accueil avec navigation principale, intégrer le design fourni par l'équipe UX, et s'assurer que la page est responsive sur tous les appareils.</p>
                    </div>

                    <!-- Project Section -->
                    <div class="detail-section">
                        <h2>Projet associé</h2>
                        <div class="project-badge">TicketPro Web Application</div>
                    </div>

                    <!-- Comments Section -->
                    <div class="detail-section">
                        <h2>Travail réalisé</h2>
                        <div class="comments-container">
                            <div class="comment">
                                <div class="comment-header">
                                    <strong>Page HTML</strong>
                                    <span class="comment-date">ajouté le 5 février à 10:30</span>
                                </div>
                                <p class="comment-text">Ajout de la page d'acceuil html en statique</p>
                            </div>
                            <div class="comment">
                                <div class="comment-header">
                                    <strong>Code JavaScript</strong>
                                    <span class="comment-date">ajouté le 6 février à 14:15</span>
                                </div>
                                <p class="comment-text">Ajout du code JavaScript FrontEnd</p>
                            </div>
                        </div>

                        <!-- Add Comment Form -->

                    </div>
                </div>

                <!-- Right Column -->
                <div class="ticket-right">
                    <!--div avec etat, prio et type-->
                    <div class="left-infos">
                    <!-- Status Card -->
                    <div class="info-card-1">
                        <div class="info-row">
                            <label>État</label>
                            <select class="select-state"name="En cours" id="">
                                <option value="1">En cours</option>
                                <option value="2">Terminé</option>
                                <option value="3">Inactif</option>
                                <option value="4">A faire</option>
                            </select>
                        </div>
                    </div>

                    <!-- Priority Card -->
                    <div class="info-card-1">
                        <div class="info-row">
                            <label>Priorité</label>
                            <select class="select-prio" name="Haute" id="">
                                <option value="3">Haute</option>

                                <option value="2">Moyenne</option>
                                <option value="1">Basse</option>
                                <option value="0">Indéterminée</option>
                            </select>
                        </div>
                    </div>

                    <!-- Type Card -->
                    <div class="info-card-1">
                        <div class="info-row">
                            <label>Type de travail</label>
                            <select class="select-type" name="Facturable" id="">
                                <option value="0">Facturable</option>
                                <option value="1">inclus</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <!-- Time Estimate Card -->
                    <div class="info-card-time">
                        <div class="info-row">
                            <label>Temps estimé : </label>
                            <label class="original-time">4</label>
                            <label> heures</label>
                        </div>
                        <div class="info-row">
                            <label>Temps réel</label>
                            <input type="number" class="input-time" value="3.5"class="value"> heures</input>
                        </div>
                        <div class="time-progress">
                            <div class="progress-bar">
                                <div class="progress-fill"></div>
                            </div>
                            <small class="time-ratio-info">75% du temps estimé utilisé</small>
                        </div>
                    </div>

                    <!-- Assignees Card -->
                    <div class="info-card">
                        <h3>Collaborateurs assignés</h3>
                        <div class="assignees">
                            <div class="assignee">
                                <span>Jean Dupont</span>
                            </div>
                            <div class="assignee">
                                <span>Marie Martin</span>
                            </div>
                        </div>
                        <a href="#add-collab-popup" class="btn btn-secondary btn-small">+ Ajouter un collaborateur</a>
                    </div>

                    <!-- Dates Card -->
                    <div class="info-card">
                        <div class="info-row">
                            <label>Créé le</label>
                            <span data-date="2026-02-03" class="value start-date">3 février 2026</span>
                        </div>
                        <div class="info-row">
                            <label>Échéance</label>
                            <input class="date-detail" type="date" value="2026-02-10">
                        </div>
                        <div class="info-row">
                            <label>Dernière modification</label>
                            <span class="value">5 février 2026</span>
                        </div>
                    </div>
                                                <div class="error-date hidden">erreur</div>

                </div>
            </div>
        </div>
                <button class="finish-detail" type="submit">Terminé</button>

    </form>
    </main>

    <!-- Menu Popup -->

    <div id="add-collab-popup">
            <form class="form-collab">
            <div class="popup-content">
                <div>
                    <h2>Ajouter un collaborateur</h2>
                    <a href="#!">X</a>
                </div>
                <input type="text" id="collab-name"  placeholder="Nom du collaborateur">
                <div  class="hidden validation-detail">Veuillez entrer un Nom et un Prénom valide</div>
                <button type="submit" >Ajouter</button>
            </div>
            </form>
    </div>
        <div  class="hidden validation-div">Veuillez entrer un Nom et un Prénom valide</div>

@endsection
@push('scripts')
    <script>
        const APP_URLS = {
            tickets: "{{ route('tickets') }}",
        };
    </script>
    <script src="{{ asset('js/ticket_detail.js') }}"></script>
@endpush
