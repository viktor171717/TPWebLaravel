# TPLaravel - Système de Gestion de Projets et Tickets

## Description

TPLaravel est une application web complète de gestion de projets et de tickets développée avec **Laravel 11**. Elle permet aux utilisateurs de créer et gérer des projets, d'ajouter des contrats, de créer et suivre des tickets, ainsi que de gérer les utilisateurs avec des rôles distincts.

## Caractéristiques principales

✅ **Gestion des projets** - Créer, modifier et suivre les projets
✅ **Gestion des contrats** - Associer des contrats aux projets
✅ **Système de tickets** - Créer et gérer des tickets pour chaque projet
✅ **Authentification sécurisée** - Système de connexion/inscription
✅ **Gestion des rôles** - Différents rôles d'utilisateurs (Admin, Client, Membre)
✅ **Tableau de bord** - Interface intuitive pour visualiser les données
✅ **Oubli de mot de passe** - Système de récupération de compte

## Prérequis

- **PHP** >= 8.2
- **Composer**
- **Node.js** et **npm**
- **Apache/NGINX** (fourni par MAMP)
- **MySQL/MariaDB** (fourni par MAMP)

## Installation

### 1. Cloner le projet
```bash
cd c:\MAMP\htdocs\
# Le projet est dans TPLaravel
cd TPLaravel
```

### 2. Installer les dépendances PHP
```bash
composer install
```

### 3. Installer les dépendances JavaScript
```bash
npm install
```

### 4. Configurer l'environnement
```bash
# Copier le fichier d'environnement
cp .env.example .env
# Ou sur Windows:
# copy .env.example .env
```

Éditer le fichier `.env` et configurer:
- `DB_HOST=127.0.0.1`
- `DB_DATABASE=tp_laravel`
- `DB_USERNAME=root`
- `DB_PASSWORD=` (vide pour MAMP par défaut)

### 5. Générer la clé d'application
```bash
php artisan key:generate
```

### 6. Exécuter les migrations
```bash
php artisan migrate
```

### 7. Compiler les assets
```bash
npm run dev
# Ou pour la production:
# npm run build
```

### 8. Démarrer l'application
```bash
# Assurez-vous que MAMP est en cours d'exécution
# Puis accédez à: http://localhost:8888/TPLaravel/public
```

## Structure du projet

```
├── app/
│   ├── Http/
│   │   └── Controllers/        # Contrôleurs de l'application
│   ├── Models/                 # Modèles Eloquent
│   │   ├── Contract.php
│   │   ├── Project.php
│   │   ├── Ticket.php
│   │   └── User.php
│   └── Providers/              # Service providers
├── database/
│   ├── factories/              # Factories pour les tests
│   ├── migrations/             # Fichiers de migration
│   └── seeders/                # Seeders pour données initiales
├── resources/
│   ├── css/                    # Styles CSS
│   ├── js/                     # JavaScript (Alpine, jQuery, etc.)
│   └── views/                  # Templates Blade
│       ├── components/         # Composants réutilisables
│       ├── layouts/            # Mises en page principales
│       ├── pages/              # Pages de l'application
│       ├── projects/           # Vues projets
│       └── tickets/            # Vues tickets
├── routes/
│   ├── web.php                 # Routes web
│   ├── api.php                 # Routes API
│   └── console.php             # Commandes
├── public/
│   ├── css/                    # Styles compilés
│   └── js/                     # Scripts JavaScript compilés
├── config/                     # Fichiers de configuration
└── storage/                    # Fichiers, logs et cache
```

## Modèles de données

### User
- `id` - Identifiant unique
- `name` - Nom de l'utilisateur
- `email` - Adresse e-mail
- `password` - Mot de passe hashé
- `role` - Rôle de l'utilisateur (admin, user, client)

### Project
- `id` - Identifiant unique
- `name` - Nom du projet
- `description` - Description
- Relation many-to-many avec `User` (via pivot table `project_user`)

### Contract
- `id` - Identifiant unique
- `number` - Numéro du contrat
- `project_id` - Référence au projet
- `description` - Description du contrat

### Ticket
- `id` - Identifiant unique
- `title` - Titre du ticket
- `description` - Description
- `status` - État (open, in_progress, closed, etc.)
- `project_id` - Référence au projet

## Routes principales

### Routes Web
- `GET /` - Page d'accueil
- `GET /login` - Formulaire de connexion
- `POST /login` - Soumettre la connexion
- `GET /signup` - Formulaire d'inscription
- `POST /signup` - Créer un compte
- `GET /forgot-password` - Récupération de mot de passe
- `GET /projects` - Liste des projets
- `GET /tickets` - Liste des tickets
- `GET /profile` - Profil utilisateur

### Routes API
Disponibles dans `routes/api.php`

## Commandes Artisan utiles

```bash
# Exécuter les migrations
php artisan migrate

# Créer une nouvelle migration
php artisan make:migration create_table_name

# Créer un nouveau modèle avec migration
php artisan make:model ModelName -m

# Créer un contrôleur
php artisan make:controller ControllerName

# Exécuter les tests
php artisan test

# Nettoyer le cache
php artisan cache:clear
php artisan config:clear

# Démarrer le serveur de développement
php artisan serve
```

## Utilisation

### Créer un compte
1. Accédez à la page d'inscription
2. Remplissez les informations (nom, email, mot de passe)
3. Cliquez sur "S'inscrire"

### Créer un projet
1. Connectez-vous à votre compte
2. Allez dans "Projets"
3. Cliquez sur "Nouveau projet"
4. Remplissez les informations et validez

### Créer un ticket
1. Allez dans un projet
2. Cliquez sur "Nouveau ticket"
3. Remplissez le titre, la description et autres détails
4. Validez

## Technologies utilisées

- **Backend**: Laravel 11
- **Frontend**: Blade Templates, HTML5, CSS3, JavaScript
- **Base de données**: MySQL/MariaDB
- **Package Manager**: Composer, npm
- **Build Tool**: Vite
- **CSS Framework**: (Personnalisé avec classes CSS)

## Fichiers de configuration importants

- `.env` - Configuration de l'environnement
- `config/app.php` - Configuration générale
- `config/database.php` - Configuration de la base de données
- `config/auth.php` - Configuration de l'authentification
- `vite.config.js` - Configuration de Vite

## Débogage

### Activer le debug mode
Éditer `.env`:
```
APP_DEBUG=true
```

### Accéder à la barre de debug
Une barre de debug s'affiche en bas de chaque page lorsque `APP_DEBUG=true`

### Consulter les logs
```bash
tail -f storage/logs/laravel.log
```

## Contribution

Pour contribuer au projet:
1. Fork le projet
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Commitez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## Licence

Ce projet est fourni à titre éducatif.

## Support

Pour toute question ou problème, consultez la documentation officielle de Laravel: https://laravel.com/docs

## Auteur

Projet développé à des fins éducatives.

---

**Dernière mise à jour**: Avril 2026
