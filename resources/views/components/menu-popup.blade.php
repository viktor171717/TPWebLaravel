<div id="menu-back" onclick="window.location.href='#!'">
    <div class="menu-popup" id="menu-popup" >
        <a href="{{ route('profile') }}" class="profile-button">
            <img src="{{ asset('images/profile.png') }}" alt="">
            Mon profil
        </a>
        <a href="{{ route('home') }}">Retour à l'accueil</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
    </div>
</div>
