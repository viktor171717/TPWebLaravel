<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function apiIndex()
    {
        $tickets = Ticket::with(['project', 'assignedUser'])->get();
        return response()->json($tickets);
    }
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'project_id'         => 'required|exists:projects,id',
            'user_id'            => 'nullable|exists:users,id',
            'priority'           => 'in:basse,normale,haute,urgente',
            'type'               => 'in:included,billable',
            'estimated_time'     => 'nullable|integer|min:0',
        ]);


        $ticket = Ticket::create($validated);

        return response()->json($ticket, 201);
    }
    public function index()
    {
        $tickets = Ticket::with(['project', 'assignedUser'])
            ->latest()
            ->get();

        $projects = Project::all();
        $users = User::where('role', 'collaborateur')->get();

        return view('tickets.index', compact('tickets', 'projects', 'users'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::where('role', 'collaborateur')->get();
        return view('tickets.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'project_id'         => 'required|exists:projects,id',
            'user_id'            => 'nullable|exists:users,id',
            'priority'           => 'in:basse,normale,haute,urgente',
            'type'               => 'in:included,billable',
            'estimated_time'     => 'nullable|integer|min:0',
        ]);

        Ticket::create($validated);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket créé avec succès.');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['project', 'assignedUser']);
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $projects = Project::all();
        $users = User::where('role', 'collaborateur')->get();

        return view('tickets.edit', compact('ticket', 'projects', 'users'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'project_id'        => 'required|exists:projects,id',
            'status'            => 'in:nouveau,en_cours,en_attente,termine,a_valider,valide,refuse',
            'type'              => 'in:included,billable',
            'priority'          => 'in:basse,normale,haute,urgente',
            'user_id'           => 'nullable|exists:users,id',
            'estimated_time'    => 'nullable|integer|min:0',
            'real_time'         => 'nullable|integer|min:0',
        ]);

        $ticket->update($validated);

        return redirect()->route('tickets.show', $ticket)
            ->with('success', 'Ticket mis à jour.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket supprimé.');
    }
}
