# TPLaravel - Resume des fonctionnalites

TPLaravel est une application web de gestion de projets et de tickets.

## Fonctionnalites presentes

- Authentification utilisateur: inscription, connexion, deconnexion.
- Ecran "mot de passe oublie" disponible depuis l'authentification.
- Tableau de bord avec:
	- projets recents,
	- tickets urgents non termines,
	- activite recente,
	- liste des collaborateurs.
- Gestion des projets:
	- creation et affichage des projets,
	- affectation d'un responsable,
	- association de collaborateurs (relation many-to-many).
- Gestion des contrats par projet:
	- creation d'un contrat,
	- mise a jour d'un contrat,
	- suivi des heures incluses, du taux horaire et de la periode.
- Gestion des tickets:
	- creation, consultation, modification, suppression,
	- liaison a un projet,
	- affectation a un collaborateur,
	- priorites (basse, normale, haute, urgente),
	- statuts (nouveau, en_cours, en_attente, termine, a_valider, valide, refuse),
	- suivi du temps estime et du temps reel,
	- type de ticket (included ou billable).
- Profil utilisateur avec recapitulatif des projets et tickets en cours.
- Gestion des roles utilisateurs en base: admin, collaborateur, client.

## Stack du projet

- Backend: Laravel 11
- Frontend: Blade, CSS, JavaScript
- Base de donnees: MySQL/MariaDB

## Perimetre

Ce fichier ne contient volontairement aucun guide d'installation: uniquement un resume des fonctionnalites actuellement presentes.
