<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->paginate(1);


        if (request()->has('search')) {
            $search = request()->get('search', '');

            $tickets = $tickets->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('location', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');

            });
        }
        return view('shared.teckettable',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Remove the dd() that was stopping execution
        //  dd(Auth::id());

        $validate = $request->validate([
            'title' => 'required|min:10|max:100',
            'description'  => 'required|min:60|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
            'priority'      => 'required|in:Haute,Moyenne,Basse',
            'soft_id'       => 'required|exists:software,id',
            'os'            => 'required|string|max:100',
        ]);
        $validate['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
            $validate['image'] = $imagePath;
        }

        // Create ticket
        $ticket = Ticket::create($validate);

        return redirect()->back()->with('success', 'Ticket créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Check if user owns the ticket or is admin (optional)
        // if ($ticket->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     abort(403);
        // }

        // Load client relationship
        $ticket->load('client');

        return view('shared.Ticketdetail', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Check if user owns the ticket or is admin (optional)
        if ($ticket->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Check if user owns the ticket or is admin (optional)
        // if ($ticket->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     abort(403);
        // }

        $validate = $request->validate([
            'title' => 'required|min:10|max:100',
            'description'  => 'required|min:60|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
            'priority'      => 'required|in:Haute,Moyenne,Basse',
            'soft_id'       => 'required|exists:software,id',
            'os'            => 'required|string|max:100',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (!empty($ticket->image)) {
                Storage::disk('public')->delete($ticket->image);
            }
            $imagePath = $request->file('image')->store('tickets', 'public');
            $validate['image'] = $imagePath;
        }

        $ticket->update($validate);

        return redirect()->route('Ticket.show', $ticket->id)->with('success', 'Ticket mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Check if user owns the ticket or is admin (optional)
        // if ($ticket->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     abort(403);
        // }

        // Delete associated image if it exists
        if (!empty($ticket->image)) {
            Storage::disk('public')->delete($ticket->image);
        }

        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket supprimé avec succès');
    }
}
