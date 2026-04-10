<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{

    // Collaborateurs
    $alice = User::create([
        'name' => 'Alice Martin', 'email' => 'alice@example.com',
        'password' => bcrypt('password'), 'role' => 'collaborateur',
    ]);
    $bob = User::create([
        'name' => 'Bob Dupont', 'email' => 'bob@example.com',
        'password' => bcrypt('password'), 'role' => 'collaborateur',
    ]);
    $charlie = User::create([
        'name' => 'Charlie Leroy', 'email' => 'charlie@example.com',
        'password' => bcrypt('password'), 'role' => 'collaborateur',
    ]);

    // Admin
    User::create([
        'name' => 'Admin', 'email' => 'admin@example.com',
        'password' => bcrypt('password'), 'role' => 'admin',
    ]);

// Projets
$p1 = Project::create(['name' => 'Application Web E-commerce', 'user_id' => $alice->id, 'description' => 'Refonte complète du site e-commerce']);
$p2 = Project::create(['name' => 'Dashboard Analytics', 'user_id' => $bob->id, 'description' => 'Tableau de bord de suivi des ventes']);
$p3 = Project::create(['name' => 'Application Mobile iOS', 'user_id' => $alice->id, 'description' => 'App mobile pour les clients']);
$p4 = Project::create(['name' => 'API REST', 'user_id' => $charlie->id, 'description' => 'Développement API REST']);
    // Attacher collaborateurs aux projets
    $p1->users()->attach([$alice->id, $bob->id]);
    $p2->users()->attach([$bob->id, $charlie->id]);
    $p3->users()->attach([$alice->id, $charlie->id]);
    $p4->users()->attach([$alice->id, $bob->id, $charlie->id]);

    // Tickets projet 1
    Ticket::create(['title' => 'Correction bug CSS', 'project_id' => $p1->id, 'user_id' => $alice->id, 'status' => 'en_cours', 'priority' => 'haute', 'type' => 'included', 'description' => 'Problème d affichage sur mobile']);
    Ticket::create(['title' => 'Intégration paiement Stripe', 'project_id' => $p1->id, 'user_id' => $bob->id, 'status' => 'nouveau', 'priority' => 'urgente', 'type' => 'included', 'description' => 'Intégrer le module de paiement']);
    Ticket::create(['title' => 'Optimisation images', 'project_id' => $p1->id, 'user_id' => $alice->id, 'status' => 'termine', 'priority' => 'normale', 'type' => 'included', 'description' => 'Compresser les images du catalogue']);
    Ticket::create(['title' => 'Ajout fonctionnalité panier', 'project_id' => $p1->id, 'user_id' => $bob->id, 'status' => 'en_attente', 'priority' => 'haute', 'type' => 'billable', 'description' => 'Nouvelle feature panier avancé']);

    // Tickets projet 2
    Ticket::create(['title' => 'Graphique ventes mensuelles', 'project_id' => $p2->id, 'user_id' => $bob->id, 'status' => 'en_cours', 'priority' => 'normale', 'type' => 'included', 'description' => 'Créer le graphique des ventes']);
    Ticket::create(['title' => 'Export CSV', 'project_id' => $p2->id, 'user_id' => $charlie->id, 'status' => 'nouveau', 'priority' => 'basse', 'type' => 'billable', 'description' => 'Permettre export des données en CSV']);
    Ticket::create(['title' => 'Filtres par date', 'project_id' => $p2->id, 'user_id' => $bob->id, 'status' => 'a_valider', 'priority' => 'normale', 'type' => 'included', 'description' => 'Ajouter filtres temporels']);

    // Tickets projet 3
    Ticket::create(['title' => 'Login Apple', 'project_id' => $p3->id, 'user_id' => $alice->id, 'status' => 'nouveau', 'priority' => 'haute', 'type' => 'included', 'description' => 'Intégrer Sign in with Apple']);
    Ticket::create(['title' => 'Push notifications', 'project_id' => $p3->id, 'user_id' => $charlie->id, 'status' => 'en_cours', 'priority' => 'urgente', 'type' => 'billable', 'description' => 'Système de notifications push']);
    Ticket::create(['title' => 'Dark mode', 'project_id' => $p3->id, 'user_id' => $alice->id, 'status' => 'refuse', 'priority' => 'basse', 'type' => 'included', 'description' => 'Support du mode sombre']);

    // Tickets projet 4
    Ticket::create(['title' => 'Documentation Swagger', 'project_id' => $p4->id, 'user_id' => $charlie->id, 'status' => 'en_cours', 'priority' => 'normale', 'type' => 'included', 'description' => 'Documenter tous les endpoints']);
    Ticket::create(['title' => 'Authentification JWT', 'project_id' => $p4->id, 'user_id' => $bob->id, 'status' => 'valide', 'priority' => 'urgente', 'type' => 'included', 'description' => 'Sécuriser les routes avec JWT']);
    Ticket::create(['title' => 'Rate limiting', 'project_id' => $p4->id, 'user_id' => $alice->id, 'status' => 'nouveau', 'priority' => 'normale', 'type' => 'billable', 'description' => 'Limiter les appels API']);
}
}
