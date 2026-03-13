@extends('layouts.guest')

@section('title', 'Accueil')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenue sur TicketPro</h1>
            <p class="subtitle">Élu n°1 des services de ticketing dans le monde</p>
            <p class="hero-description">Gestion de projets intégrée, édition de tickets et support client à votre portée</p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                <a href="#services" class="btn btn-secondary">Découvrir nos services</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <h2>Nos Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">📊</div>
                <h3>Gestion de projets intégrée</h3>
                <p>Organisez vos projets en toute simplicité avec nos outils de collaboration avancés et nos tableaux de bord intuitifs.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🎫</div>
                <h3>Gestion et édition de tickets</h3>
                <p>Créez, modifiez et suivez vos tickets en temps réel avec un système de priorité et de catégorisation flexible.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">💬</div>
                <h3>Service client personnalisé</h3>
                <p>Bénéficiez d'un support dédié et réactif pour résoudre tous vos problèmes et optimiser votre utilisation.</p>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section id="pourquoi" class="why-us">
        <h2>Pourquoi TicketPro ?</h2>
        <div class="features">
            <div class="feature">
                <h4>⚡ Rapide</h4>
                <p>Interface légère et performante pour une productivité maximale</p>
            </div>
            <div class="feature">
                <h4>🔒 Sécurisé</h4>
                <p>Vos données sont protégées avec les derniers standards de sécurité</p>
            </div>
            <div class="feature">
                <h4>👥 Collaboratif</h4>
                <p>Travaillez en équipe efficacement avec nos outils de partage</p>
            </div>
            <div class="feature">
                <h4>📈 Scalable</h4>
                <p>Grandissez sans limites, des petites équipes aux grandes organisations</p>
            </div>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2026 TicketPro. Tous droits réservés.</p>

        </div>
    </footer>
        <div id="menu-back" onclick="window.location.href='#!'">
            <div class="menu-popup" id="menu-popup">
                <a href="{{ route('profile') }}" class="profile-button">
                        <img src="{{ asset('images/profile.png') }}" alt="">
                        Mon profil
                    </a>
                <a href="{{ route('home') }}">Retour à l'accueil</a>
                <a href="{{ route('login') }}">Se déconnecter</a>
                <a href="{{ route('settings') }}">Paramètres</a>



            </div>
        </div>
@endsection
