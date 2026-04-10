@extends('layouts.app')

@section('title', 'Menu principal - TicketPro')

@section('content')

    <main class="board-main">
        <aside>
            <section class="recently-viewed">
                <h1>Vus récemment</h1>
                <div class = "recent-items">
                    @foreach($recent as $item)
                        <div class="sideBox">
                            @if ($item instanceof \App\Models\Project)
                                <a href="{{ route('projects.index') }}#project-{{ $item->id }}" class="word">{{ $item->name }}</a>
                            @elseif ($item instanceof \App\Models\Ticket)
                                <a href="{{ route('tickets.show', $item) }}" class="word">{{ $item->title }}</a>
                            @endif
                        </div>
                    @endforeach

                </div>
            </section>
            <section class="recently-viewed", id ="collaborators">
                <h1>Mes collaborateurs</h1>
                <div class = "recent-items">
                @foreach($collaborateurs as $user)
                    <div class="sideBox">
                        <span class="word">{{ $user->name }}</span>
                    </div>
                @endforeach
                </div>
            </section>
        </aside>
        <section class="board-content project-list">
            <h1 id = "projects">MES PROJETS</h1>
                @foreach($projects as $project)

                    <div>
                        <a href="{{ route('projects.index') }}#project-{{ $project->id }}" class="board-project">
                            {{ $project->name }}
                        </a>
                    </div>
                @endforeach
            <h1 id = "tickets">TICKETS URGENTS</h1>
                @foreach($urgentTickets as $ticket)
                    <div>
                        <a href="{{ route('tickets.show', $ticket) }}" class="board-project">
                            {{ $ticket->title }}
                        </a>
                    </div>
                @endforeach
        </section>

    </main>
@endsection
    <script src="script.js" src ></script>

