<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title', 'TicketPro - Gestion de Tickets Professionelle')</title>
</head>
<body>
    <header>
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="TicketPro Logo">
            </a>
        </div>
        <nav class="headerNav">
            <a href="#services">Nos services</a>
            <a href="#pourquoi">Pourquoi nous ?</a>
            <a href="#menu-back" id="menu-toggle">☰</a>
        </nav>
    </header>
    @include('components.menu-index')

    @yield('content')
    @stack('scripts')

</body>
</html>
