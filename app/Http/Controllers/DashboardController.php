<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
class DashboardController extends Controller
{

    public function dashboard()
    {
        $projects = Project::with('user')->latest()->take(5)->get();
        $urgentTickets = Ticket::where('priority', 'urgente')
                            ->where('status', '!=', 'termine')
                            ->latest()
                            ->take(5)
                            ->get();
        $collaborateurs = User::where('role', 'collaborateur')->get();

        $projectsRecent = Project::latest()->take(4)->get();
        $ticketsRecent = Ticket::latest()->take(4)->get();

        $recent = $projectsRecent->concat($ticketsRecent)
            ->sortByDesc('created_at')
            ->take(4);

        return view('board', compact('projects', 'urgentTickets', 'collaborateurs', 'recent'));
    }
}
