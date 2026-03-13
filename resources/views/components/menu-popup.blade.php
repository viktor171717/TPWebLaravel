<div id="menu-back" onclick="window.location.href='#!'">
    <div class="menu-popup" id="menu-popup">
        <a href="{{ route('home') }}" class="profile-button">
            <img src="{{ asset('images/profile.png') }}" alt="">
            Mon profil
        </a>
        <a href="{{ route('home') }}">Retour à l'accueil</a>
        <a href="{{ route('login') }}">Se déconnecter</a>
        <a href="{{ route('settings') }}">Paramètres</a>
    </div>
</div>
