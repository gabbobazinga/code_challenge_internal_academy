<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'workshops' => Workshop::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Workshop::class);

        return Inertia::render('Workshops/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Workshop::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        Workshop::create($validated);

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        $this->authorize('view', $workshop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        $this->authorize('update', $workshop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $this->authorize('update', $workshop);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        $workshop->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $this->authorize('delete', $workshop);
        
        $workshop->delete();

        return redirect()->route('dashboard');
    }
}
