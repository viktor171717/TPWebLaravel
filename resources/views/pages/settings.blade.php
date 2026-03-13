@extends('layouts.app')
@section('title', 'Paramètres - TicketPro')
@section('content')
    <main>
    <h1 class="settings">Paramètres</h1>

    <div>
        <div class="settings-1">

            <div class="settings-img">
                <img src="{{ asset('images/profile.png') }}" alt="">
                <div class="settings-2">
                    <p class = "settings-title">Photo de profil</p>
                    <p class="settings-text">Changez la photo de profil pour aider vos collaborateurs à vous reconnaître.</p>
                </div>
            </div>
        <div class="container-photo">
            <input type="file" class="photo-fix" accept="image/*">

            <div class="photo-input">
                Changer la photo
            </div>
        </div>

        </div>
        <div class="settings-1">
            <div class="settings-2">
                <p class = "settings-title">Nom d'utilisateur</p>
                <p class="settings-text" >Jean Dupont <input id="username-display" type="text" value="Jean Dupont" id="username-input"></p>
            </div>
            <a href="#username-display">Modifier</a>
        </div>

    </div>

                            <div  class="hidden validation-username">Veuillez entrer un Nom et un Prénom valide</div>
    <div  class="hidden validation-div">Veuillez entrer un Nom et un Prénom valide</div>

    </main>
@endsection
@push('scripts')
    <script src="{{ asset('js/settings.js') }}"></script>
@endpush
