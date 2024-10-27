<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'event_date' => 'required|date|after:today',
            'max_attendees' => 'required|integer|min:1',
        ]);
        if ($id) {
            Event::where('id', $id)->update($request->only(['name', 'description', 'event_date', 'max_attendees']));
            return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
        } else {
            Event::create($request->all());
            return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
        }

    }

    public function show(Event $event)
    {
        return view('admin.events.create', compact('event'));
    }
}
