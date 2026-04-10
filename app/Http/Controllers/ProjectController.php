<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['user', 'users', 'tickets.assignedUser', 'contract'])
            ->latest()
            ->get();

        $users = User::orderBy('name')->get();

        return view('projects.index', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id'   => 'required|exists:users,id',
            'users'       => 'nullable|array',
            'users.*'     => 'exists:users,id',
        ]);

        $project = Project::create($validated);
        // Attache les collaborateurs via la table pivot
        $project->users()->sync($validated['users'] ?? []);

        return redirect()->route('projects.index')
            ->with('success', 'Projet créé.');
    }
}
