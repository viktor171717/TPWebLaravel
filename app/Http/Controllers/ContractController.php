<?php
namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Project;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function create(Project $project)
    {
        return redirect()->route('projects.index');
    }

    public function edit(Contract $contract)
    {
        return redirect()->route('projects.index');
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'hours_included' => 'required|integer|min:1',
            'hourly_rate'    => 'nullable|numeric|min:0',
            'starts_at'      => 'nullable|date',
            'ends_at'        => 'nullable|date|after:starts_at',
        ]);

        $project->contract()->create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Contrat créé.');
    }



    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'hours_included' => 'required|integer|min:1',
            'hourly_rate'    => 'nullable|numeric|min:0',
            'starts_at'      => 'nullable|date',
            'ends_at'        => 'nullable|date|after:starts_at',
        ]);

        $contract->update($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Contrat mis à jour.');
    }
}
