<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')
        ->latest()
        ->take(50)
        ->get();
        
        return view('home', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the request data
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ],[
            'message.required' => 'Please write something to Chirp!.',
            'message.max' => 'The Chirp may not be greater than 255 characters.',
            'message.min' => 'The Chirp must be at least 5 characters.',
        ]);

        //Create a new chirp associated with the authenticated user
        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Your Chirp has been posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ],[
            'message.required' => 'Please write something to Chirp!.',
            'message.max' => 'The Chirp may not be greater than 255 characters.',
            'message.min' => 'The Chirp must be at least 5 characters.',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Your Chirp has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        // $this->authorize('delete', $chirp);
        $chirp->delete();

        return redirect('/')->with('success', 'Your Chirp has been deleted!');
    }
}
