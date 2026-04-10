<header>
    <div>
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="logo">
        </a>
    </div>
    <nav class="headerNav">
        <a href="{{ route('projects.index') }}">Mes projets</a>
        <a href="{{ route('tickets.index') }}">Mes tickets</a>
        <a href="#menu-back" id="menu-toggle">☰</a>
    </nav>
</header>
