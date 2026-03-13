<header>
    <div>
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>
    <nav class="headerNav">
        <a href="{{ route('projects') }}">Mes projets</a>
        <a href="{{ route('tickets') }}">Mes tickets</a>
        <a href="{{ route('tickets.new') }}">Nouveau ticket</a>
        <a href="#menu-back" id="menu-toggle">☰</a>
    </nav>
</header>
