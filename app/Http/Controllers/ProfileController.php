<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $projects = Project::with('user')->latest()->take(5)->get();
        $tickets = Ticket::where('status', '!=', 'termine')
                            ->latest()
                            ->take(5)
                            ->get();
        return view('profile', compact('name', 'email', 'projects', 'tickets'));
    }

}
