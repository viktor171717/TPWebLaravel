@extends('layouts.app')

@section('title', 'Projets - TicketPro')

@section('content')

    <main>
        <h1 id="projects-title">Mes Projets</h1>

        <!-- Projet 1 -->
        <section>
            <h2 id="projet1" class="project-name">Application Web E-commerce</h2>
            <table  class = "project-table">
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
                                <li>Jean Dupont</li>
                                <li>Marie Martin</li>
                                <li>Sophie Lefebvre</li>
                            </ul>
                        </td>
                        <td class ="project-list-middle">
                            <ul>
                                <li>Implémentation page produits</li>
                                <li>Système de paiement</li>
                                <li>Panier d'achat</li>
                            </ul>
                        </td>
                        <td class="project-list-end">
                            <ul>
                                <li>Heures incluses: 50h / an</li>
                                <li>Période: 2024-2025</li>
                                <li>Taux horaire supplémentaires: 75€/h</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="project-button">
                        <td><a href="#add-collab-popup" class="button-add-collab">Ajouter collaborateurs</a></td>
                        <td><a href="#new-ticket-project" class="button-add-ticket">Ajouter tickets</a></td>
                        <td><a href="#modify-contract" class="button-change-contract">Modifier contrat</a></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Projet 2 -->
        <section>
            <h2 id="projet2" class="project-name">Dashboard Analytics</h2>
            <table class = "project-table">
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
                                <li>Pierre Bernard</li>
                                <li>Thomas Lefevre</li>
                            </ul>
                        </td>
                        <td class ="project-list-middle">
                            <ul>
                                <li>Graphiques en temps réel</li>
                                <li>Export données CSV</li>
                                <li>Filtres avancés</li>
                            </ul>
                        </td>
                        <td class="project-list-end">
                            <ul>
                                <li>Heures incluses: 80h / an</li>
                                <li>Période: 2025-2026</li>
                                <li>Taux horaire supplémentaires: 65€/h</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="project-button">
                        <td><a href="#add-collab-popup" class="button-add-collab">Ajouter collaborateurs</a></td>
                        <td><a href="#new-ticket-project" class="button-add-ticket">Ajouter tickets</a></td>
                        <td><a href="#modify-contract" class="button-change-contract">Modifier contrat</a></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Projet 3 -->
        <section>
            <h2 id="projet3" class="project-name">Application Mobile iOS</h2>
            <table  class = "project-table">
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
                                <li>Luc Moreau</li>
                                <li>Sophie Lefebvre</li>
                            </ul>
                        </td>
                        <td class="project-list-middle">
                            <ul>
                                <li>Interface utilisateur</li>
                                <li>Intégration API backend</li>
                                <li>Tests et QA</li>
                                <li>Déploiement App Store</li>
                            </ul>
                        </td>
                        <td class="project-list-end">
                            <ul>
                                <li>Heures incluses: 100h / an</li>
                                <li>Période: 2024-2026</li>
                                <li>Taux horaire supplémentaires: 85€/h</li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="project-button">
                        <td><a href="#add-collab-popup" class="button-add-collab">Ajouter collaborateurs</a></td>
                        <td><a href="#new-ticket-project" class="button-add-ticket">Ajouter tickets</a></td>
                        <td><a href="#modify-contract" class="button-change-contract">Modifier contrat</a></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <div id="add-collab-popup">
            <form class="form-collab">
            <div class="popup-content">
                <div>
                    <h2>Ajouter un collaborateur</h2>
                    <a href="#!">X</a>
                </div>
                <input type="text" id="collab-name"  placeholder="Nom du collaborateur">
                <div  class="hidden validation-project">Veuillez entrer un Nom et un Prénom valide</div>
                <button type="submit" >Ajouter</button>
            </div>
            </form>
        </div>
        <div class="div-new-ticket-button project"><a href="#new-project">+    Nouveau projet</a></div>

            <div class="new-ticket" id ="new-ticket-project">
            <div class="new-first-div">
                                <a href="#!">X</a>

                <form class="create-ticket">
                <h1>Ajouter un ticket</h1>

                <div class = "new-ticket-div"><input type="text" placeholder = "Titre du ticket :" class = "title-input"></div>
                <div  class="hidden validation-ticket-1">Veuillez entrer un Nom et un Prénom valide</div>

                <div class = "new-ticket-div"><textarea rows="4"  placeholder="Description du ticket"></textarea></div>
                <div  class="hidden validation-ticket-2">Veuillez entrer un Nom et un Prénom valide</div>


                <div class = "new-ticket-div">
                    <label for="ticket-priority-ticket">Priorité :</label>
                    <select id="ticket-priority-ticket"  >
                        <option value="low">Basse</option>
                        <option value="medium">Moyenne</option>
                        <option value="high">Haute</option>
                    </select>
                </div>


                <!-- <div class = "new-ticket-div">
                    <label for="ticket-project">Projet :</label>
                    <select id="ticket-project"  >
                        <option value="1">Application Web E-commerce</option>
                        <option value="2">Dashboard Analytics</option>
                        <option value="3">Application Mobile iOS</option>
                    </select>
                </div> -->





                <div class="div-button-ticket"><button type = "submit">Créer le ticket</button></div>
                </form>
            </div>
            </div>
            <div class="new-ticket" id ="new-project">
            <div class="new-first-div">
                <form action="" class ="form-project">
                <h1>Ajouter un projet</h1>
                <a href="#!">X</a>

                <div class = "new-ticket-div"><input type="text" placeholder = "Titre du projet :" class = "title-input"></div>
                                <div  class="hidden validation-project-1">Veuillez entrer un Nom et un Prénom valide</div>

                <div class = "new-ticket-div"><textarea rows="4"  placeholder="Description du projet"></textarea></div>
                                <div  class="hidden validation-project-2">Veuillez entrer un Nom et un Prénom valide</div>


                <div class = "new-ticket-div">
                    <label for="project-contract">Contrat :</label>
                    <select id="project-contract"  >
                        <option value="low">contrat 1 : 50h + 75€/h</option>
                        <option value="medium">contrat 2 : 100h + 60€/h</option>
                        <option value="high">contrat 3 : 150h + 50€/h</option>
                    </select>
                </div>
                <label for="ticket-priority">Collaborateurs :</label>

                <div class = "collab-div">
                    <label class = "collab-label">Pierre Bernard<input type="checkbox"></label>
                    <label class = "collab-label">Marie Dubois<input type="checkbox"></label>
                    <label class = "collab-label">Jean Martin<input type="checkbox"></label>
                    <label class = "collab-label">Sophie Laurent<input type="checkbox"></label>
                    <label class = "collab-label">Thomas Moreau<input type="checkbox"></label>
                </div>
                    <div  class="hidden validation-project-3">Veuillez entrer un Nom et un Prénom valide</div>

                <div class="div-button-ticket"><button type="submit">Créer le projet</but></div>
                </form>
            </div>
            </div>
        </form>
        <form class="form-contract">
            <div class="new-ticket" id ="modify-contract">
            <div class="new-first-div">
                <h1>Modifier le contrat</h1>
                <a href="#!">X</a>

                <div class = "new-ticket-div">
                    <label for="project-contract-modify">Contrat :</label>
                    <select id="project-contract-modify"  >
                        <option value="low">contrat 1 : 50h + 75€/h</option>
                        <option value="medium">contrat 2 : 100h + 60€/h</option>
                        <option value="high">contrat 3 : 150h + 50€/h</option>
                    </select>
                </div>

                <div class="div-button-ticket"><button type="submit">Modifier le contrat</button></div>
            </div>
            </div>
        </form>
    </main>
    <div  class="hidden validation-div">Veuillez entrer un Nom et un Prénom valide</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/projects.js') }}"></script>
@endpush
